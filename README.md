# 6130COMP Cloud Assignment

Runners Crisps Footbal Competition ⚽️

Running using docker-compose
```docker
sudo docker-compose up
```

## Presentation tier 🤓

The presentation tier consists of two folders
```
presentation
    -> loadbalancer
    -> website
```

The nginx load blanacer uses least connected method to proxy request and listens on PORT 80. 
The  website is a basic php site with a HTML form and uses templates, the form contains basic client side validation using regex

## Backend tier 🥸

The business tier handles the form from the frontend and then communicates with the backend to check if the code is valid

## Database tier 🧑‍💻
