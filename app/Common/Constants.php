<?php

namespace App\Common;

use Illuminate\Support\Facades\Log;

class Constants
{
    const TOP_BRAND_COUNT = 5;
    const TOP_CATEGORY_COUNT = 4;
    const TOP_PRODUCT_COUNT = 8;

    const ACTION_SUCCESS = 'success_message';
    const ACTION_ERROR = 'error_message';

    const LOGOUT_SUCCESS = 'Logout successfully.';
    const REGISTER_SUCCESS = 'Register successfully.';
    const LOGIN_DETAIL_INVALID = 'Please enter valid login details.';

    const ITEMS_PER_PRODUCTS_PAGE = 9;

    const BEST_SELLER_PRODUCTS_SIDEBAR_COUNT = 3;

    const RELATED_PRODUCTS_COUNT = 8;

    private function __construct()
    {
    }
}
