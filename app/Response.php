<?php

namespace App;

class Response
{
    const HTTP_SUCCESS = 200;
    const HTTP_SUCCESS_POST = 201;
    const HTTP_SUCCESS_NO_RETURN = 204;
    const HTTP_FORBIDDEN = 403;
    const HTTP_NOT_FOUND = 404;
    const HTTP_CONFLICT = 409;
    const HTTP_NOT_PROCESSABLE = 422;
    const HTTP_UNAUTHORIZED = 401;

    const SUCCESS = 'Success';
    const FAIL = 'Failure';

    const TRUE = 1;
    const FALSE = 0;

    const MALE = 1;
    const FEMALE = 2;
    const MALE_STRING = "MALE";
    const FEMALE_STRING = "FEMALE";

    const IS_REQUIRED = 'is required';
    const IS_A_STRING = 'must be a string';
    const IS_A_NUMBER = 'must be a number';
    const IS_AN_EMAIL = 'must be an email';

    const INVALID_CREDENTIAL = 'Invalid Credentials';
    const INVALID_EMAIL = 'Email already exists';
    const SUCCESSFULLY_LOGGED_IN = 'Successfully Logged In';
    const INCORRECT_LOGIN_INPUT = 'Please input email';
    const USER_NOT_FOUND = 'User not found';
    const SUCCESSFULLY_GET_ALL_USERS = 'Successfully get all users';
    const SUCCESSFULLY_GET_USER = 'Successfully get all user';
    const SUCCESSFULLY_CREATED_USER = 'Successfully created user';
    const SUCCESSFULLY_UPDATED_USER = 'Successfully updated user';
    const SUCCESSFULLY_SET_ROLE = 'Successfully set role';
    const SUCCESSFULLY_GET_USER_ROLES = 'Successfully get all user with roles';
    const FAILED_TO_CREATE_USER = 'User already exists';

    //Roles
    const SUCCESSFULLY_GET_ALL_ROLES = 'Successfully get all roles';
    const SUCCESSFULLY_GET_ROLE = 'Successfully get all role';
    const SUCCESSFULLY_CREATED_ROLE = 'Successfully created role';
    const SUCCESSFULLY_UPDATED_ROLE = 'Successfully updated role';
}