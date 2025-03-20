<?php

// Basic Redis connection
$redis = new Redis();
$redis->connect('redis', 6379);

// store user emails
$emails = [
    'test@gmail.com',
    'test@gmail.com',
    'test@gmail.com',
];

// store user emails in Redis
$redis->set('user_emails', json_encode($emails));

// retrieve user emails from Redis
print_r($redis->get('user_emails'));
