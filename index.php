<?php
session_start();

if(isset($_GET['page'])){

    if ($_GET['page']=='admin' && !empty($_GET['param'])  && isset($_SESSION['user']) && $_SESSION['user']['admin']==1 ){
        switch ($_GET['param']){
            case 'index':
                require('./controller/admin/admin_index_controller.php');
                break;
            case 'user_list':
                require('./controller/admin/user_list_controller.php');
                break;
            case 'user_form':
                require('./controller/admin/user_form_controller.php');
                break;
            case 'event_list':
                require('./controller/admin/events_list_controller.php');
                break;
            case 'event_form':
                require('./controller/admin/event_form_controller.php');
                break;
            case 'services_list':
                require('./controller/admin/services_list_controller.php');
                break;
            case 'service_form':
                require('./controller/admin/service_form_controller.php');
                break;
            case 'faq_list':
                require('./controller/admin/faq_list_controller.php');
                break;
            case 'faq_form':
                require('./controller/admin/faq_form_controller.php');
                break;
            case 'faq_category_list':
                require('./controller/admin/faq_category_list_controller.php');
                break;
            case 'faq_category_form':
                require('./controller/admin/faq_category_form_controller.php');
                break;
            case 'fees_list':
                require('./controller/admin/fees_list_controller.php');
                break;
            case 'fees_form':
                require('./controller/admin/fees_form_controller.php');
                break;
            default:
                require('./controller/admin/admin_index_controller.php');
                break;
        }
    }else{
        switch ($_GET['page']) {
            case 'index':
                require('./controller/index_controller.php');
                break;
            case 'informations':
                require('./controller/event_controller.php');
                break;
            case 'events':
                require('./controller/information_controller.php');
                break;
            case 'login':
                require('./controller/login_controller.php');
                break;
            case 'contact':
                require('./controller/signal_controller.php');
                break;
            case 'account':
                require('./controller/account_controller.php');
                break;
            case 'admin':
                if (isset($_SESSION['user']) && $_SESSION['user']['admin']==1){
                    require('./controller/admin/admin_index_controller.php');
                }else{
                    require('./controller/index_controller.php');
                }
                break;
            case 'logout':
                unset($_SESSION['user']);
                require('./controller/index_controller.php');
                break;
            default:
                require('./controller/index_controller.php');
                break;
        }
    }


}
else{

    require('./controller/index_controller.php');

}

