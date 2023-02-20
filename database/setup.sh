#!/bin/bash

apt update -y
apt install lolcat -y
echo "Creating MongoDB database..." | lolcat --force

DELAY=30

sleep $DELAY

# Create a mongodb replica set
mongo --host mongo1:27017 <<EOF
var config = {
    "_id": "rs0",
    "version": 1,
    "members": [
        {
            "_id": 1,
            "host": "mongo1:27017",
            "priority": 2
        },
        {
            "_id": 2,
            "host": "mongo2:27017",
            "priority": 1
        },
        {
            "_id": 3,
            "host": "mongo3:27017",
            "priority": 1
        }
    ]
};
rs.initiate(config, { force: true });
EOF

echo "****** Waiting for ${DELAY} seconds for replicaset configuration to be applied ******" | lolcat --force

sleep $DELAY

mongo --host mongo1:27017 < /scripts/init.js