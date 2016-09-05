<?php

require_once 'vendor/autoload.php';

Use Acme\Users\Person;
Use Acme\Staff;
Use Acme\Business;

$jeffrey = new Person('Jeffrey Way');
$staff = new Staff([$jeffrey]);
$laracasts = new Business($staff);

$laracasts->hire(new Person('Jane Doe'));
var_dump($laracasts->getStaffMembers());
