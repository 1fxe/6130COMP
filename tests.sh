docker-compose up -D

curl --request GET \
  --url 'http://192.168.128.3:3000/backend.php' \
  --header 'content-type: application/x-www-form-urlencoded' \
  --data 'usersName=Filip Wedzicha' \
  --data email=test@email.com \
  --data 'address=Some Address' \
  --data code=1234567890 \
  --data 'playerName=Lionel Messi'