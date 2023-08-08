<?php

namespace App\Constants;

class MessageConstants
{
    const ACTION_SUCCESS = 'action_success';
    const ACTION_ERROR = 'action_error';

    const CREATE_SUCCESS = 'Create successfully.';
    const UPDATE_SUCCESS = 'Update successfully.';
    const DELETE_SUCCESS = 'Delete successfully.';
    const OPERATION_FAILURE = 'Operation failed.';

    const LOGOUT_SUCCESS = 'Logout successfully.';
    const REGISTER_SUCCESS = 'Register successfully.';
    const LOGIN_DETAIL_INVALID = 'Please enter valid login details.';

    private function __construct()
    {
    }
}
