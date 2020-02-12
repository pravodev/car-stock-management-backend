<?php

function getFieldUsername($field){
    return \filter_var($field, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
}