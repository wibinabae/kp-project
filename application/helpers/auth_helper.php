<?php

function getActiveUser()
{
    $CI = get_instance();
    $CI->load->model('User_model');

    $userID = $CI->session->userdata('ID');
    $activeUser = $CI->User_model->get_user_by_id($userID);

    return $activeUser;
}


function mustLogin()
{
    if (getActiveUser() == null) {
        redirect('auth');
    }
}

function preventRelogin()
{
    if (getActiveUser()) {
        redirect();
    }
}

function getUserMenus($userID, $endpoint)
{
    $CI = get_instance();
    $CI->load->model('RoleAccess_model');

    $rawMenus = $CI->RoleAccess_model->get_detailRoleAccess($userID);

    $menus = [];
    $menuIds = [];
    $isAllowed = false;
    foreach ($rawMenus as $menu_) {
        // validasi apakah endpoint ditemukan
        if (strtolower($menu_['Link_Menu']) == strtolower($endpoint) || strtolower($menu_['Link_Submenu']) == strtolower($endpoint)) {
            $isAllowed = true;
        }

        if (!in_array($menu_['MenuID'], $menuIds)) {
            $menuIds[] = $menu_['MenuID'];
            $menus[] = [
                "MenuID" => $menu_['MenuID'],
                "MenuName" => $menu_['MenuName'],
                "Icon" => $menu_['Icon'],
                "Link_Menu" => $menu_['Link_Menu'],
                "Submenu" => []
            ];
        }

        foreach ($menus as &$menu) {
            if ($menu['MenuID'] ==  $menu_['MenuID']) {
                if ($menu_['IsVisible']) {
                    $menu['Submenu'][] = [
                        "SubmenuID" => $menu_["SubmenuID"],
                        "SubmenuName" => $menu_["SubmenuName"],
                        "Link_Submenu" => $menu_["Link_Submenu"]
                    ];
                }
            }
        }
    }

    return ["list" => $menus, "isAllowed" => $isAllowed];
}
