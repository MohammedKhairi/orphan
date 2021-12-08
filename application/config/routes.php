<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
#for ajax
// $route['ajax-request'] = 'User/create_user';
// $route['ajax-requestPost']['post'] = 'User/create_user';
$route[''] = 'home/index';

//###############[s_User]################
//تسجيل الدخول
$route['User/Login'] = 'User/log_in';

//التحقق من معلومات تسجيل الدخول
$route['User/user_login'] = 'User/check_login';
//التحقق من معلومات تسجيل الدخول
$route['User/Login_Out'] = 'User/logout_user';

// عرض لوحة المعلومات الشخصية للمستخدم عند تسجيل الدخول
$route['User/Profile'] = 'User/profile';
//تعديل معلومات المستخدمين
$route['User/Edit_info'] = 'User/profile_edit';
// عرض مهام  المستخدمين
$route['User/Task'] = 'User/show_taskes';

// عرض اشعارات  لْلمستخدمين
$route['User/Notefecation'] = 'User/show_notefecation';
// كفالة يتيم جديد
$route['User/Sponsor_new_orphan'] = 'User/s_new_orphan';
// كفالة يتيم جديد ادخال المعلومات
$route['User/Inser_New_orphan'] = 'User/insert_s_new_orphan';

//عرض مهام عضومن اعضاء فرقة جمع التبرعات و فرق رعاية الايتام المسجلين الدخول 
$route['User/Team_Task'] = 'User/get_team_task';

//تحديث معلومات المستخدمين الكفيل
//$route['User/Profile_update_Sponsor'] = 'user/profile_update_sponsor';

//تحديث معلومات المستخدمين  للفرق التطوعية
//name
$route['User/Update/(:any)'] = 'User/update/$1';


//###############[e_User]################
 //###[team]##
// اضافة عضو جديد الى الفرق 
$route['Team/Join'] = 'User/add_member_t';
//   عرض لوحة ْفحص الايميل 
$route['Team/Email_Check'] = 'User/check_email';
//    اضافة المتطوع الى المؤسسة يعد فحص الايميل
$route['Team/Add_Member'] = 'User/insert_memmber';
 //###[sponsor]##
// اضافة كفيل 
$route['Sponsor/Join'] = 'User/add_member_s';
//    للكفيل عرض لوحة ْفحص الايميل 
$route['Sponsor/Email_Check'] = 'User/check_email_s';
//    اضافة كفيل الى المؤسسة يعد فحص الايميل
$route['Sponsor/Add_Member'] = 'User/insert_memmber_s';
 //###[comments]##
//أضافة تعليق على خبر معين
$route['Comment/Add'] = 'User/add_comment';
//ارسال رسالة او استفسار
$route['Contact/Message'] = 'home/Message';
//  عرض للمستخدم حدث معين
$route['News/Show_Event/(:any)'] = 'home/show_event/$1';
//  عرض للمستخدم  مجلة معينة
$route['Gallary/Show/(:any)'] = 'home/show_gallary/$1';
 //###[Support]##
 $route['Support/Clothes'] = 'User/s_clothes';
 $route['Support/Medical'] = 'User/s_medical';
 $route['Support/Cash'] = 'User/s_cash';
 $route['Support/Home'] = 'User/s_home';
 $route['Support/Food'] = 'User/s_food';

//###############[s_orphan]################
//عرض الايتام غير المكفولين
$route['Admin/Show_orphan'] = 'orphan/show_o';
//عرض الايتام المكفولين
$route['Admin/Show_orphan_s'] = 'orphan/show_o_s';
//اضافة يتيم
$route['Admin/Add_orphan'] = 'orphan/add_o';
//جديد اضافة يتيم
$route['Admin/New_orphan'] = 'orphan/new_o';

//حذف يتيم
$route['Admin/Delete_orphan/(:any)'] = 'orphan/delete_o/$1';
//حذف كفيل  اليتيم
$route['Admin/Delete_orphan_s/(:any)'] = 'orphan/delete_o_s/$1';
// عرض لوحة تعديل معلومات اليتيم
$route['Admin/Edite_orphan/(:any)'] = 'orphan/edit_o/$1';
// تحديث معلومات اليتيم
$route['Admin/Update_orphan/(:any)'] = 'orphan/update_o/$1';
//###############[e_orphan]################ 



//###############[s_admin]################ 

//لوحة تسجيل الدخول للادمن  
$route['wp-admin'] = 'admin/login_show';
$route['Admin/wp-admin'] = 'admin/login_show';
// تسجيل الدخول للادمن  فحص
$route['ck_login'] = 'admin/login';
// تسجيل الخروج
$route['Admin/Logout'] = 'admin/logout';
// عرض لوحة تعديل معلومات الادمن
$route['Admin/Edite_Admin'] = 'admin/edit_a';
// تحديث معلومات الادمن
$route['Admin/Update_admin'] = 'admin/update_a';
//  معلومات الادمن
$route['Admin/Info_Admin'] = 'admin/show_a';

//###############[e_admin]################ 

//###############[S_Gallary]################ 
//عرض المجلات
$route['Admin/show_gallary'] = 'gallary/show_g';

// عرض واجهة أضافة مجلة
$route['Admin/Add_gallary'] = 'gallary/add_g';
//أضافة مجلة
$route['Admin/insert_gallary_t'] = 'gallary/insert_g';
//عرض لوحة أضافة صورةالى مجلة
$route['Admin/Add_photo'] = 'gallary/insert_g_img';
//أضافة الصورةالى مجلة
$route['Admin/insert_gallary'] = 'gallary/insert_img';

// تعديل على مجلة واحدة عرض اللوحة
$route['Admin/Edite_Gallary/(:num)'] = 'gallary/edit_g_img/$1';
// تعديل عنوان المجلة
$route['Admin/Update_gallary_title/(:any)'] = 'gallary/update_title/$1';
//حذف صورة من المجلة
$route['Admin/Delete_Gallary_img/(:any)'] = 'gallary/delete_img/$1';


//###############[E_Gallary]################ 

//###############[S_News]################ 
    //عرض الاخبار 
$route['Admin/Show_News'] = 'news/show_n';

// اضافة الخبر عرض لوحة
$route['Admin/Add_News'] = 'news/add_n';

// اضافة الخبر
$route['Admin/insert_event'] = 'news/insert_n';

//حذف الخبر
$route['Admin/Delete_News/(:any)'] = 'news/delete_n/$1';
// عرض لوحة تعديل معلومات الخبر
$route['Admin/Edite_News/(:any)'] = 'news/edit_n/$1';
// تحديث معلومات الخبر
$route['Admin/Update_News/(:any)'] = 'news/update_n/$1';

//###############[E_News]################ 

//###############[S_message]################ 
// عرض جميع الرسائل
$route['Admin/Show_Message'] = 'message/show_m';
// حذف  الرسائل
$route['Admin/Delete_Message/(:any)'] = 'message/delete_m/$1';
//  عرض محتوى الرسائل
$route['Admin/View_Message/(:any)'] = 'message/view_m/$1';
//  الرد على الرسائل
$route['Admin/insert_replay/(:any)'] = 'message/replay_m/$1';
//###############[E_message]################ 
//###############[S_comment && replay]################ 
// عرض جميع التعليقات
$route['Admin/Show_Comment'] = 'comment/show_c';
// حذف  التعليقات
$route['Admin/Delete_Comment/(:any)'] = 'comment/delete_c/$1';
//  عرض محتوى التعليقات
$route['Admin/View_Comment/(:any)'] = 'comment/view_c/$1';
//  الرد على التعليقات
$route['Admin/Insert_replay/(:any)'] = 'comment/replay_c/$1';
//###############[E_comment && replay]################ 

//###############[S_team]################ 
// عرض جميع اعضاء الفرق جمع التبرعات 
$route['Admin/Show_Team_g_Mony'] = 'team/show_t_g_mony';
//عرض مهام عضومن اعضاء فرقة جمع التبرعات 
$route['Admin/Team_g_Mony_support/(:any)'] = 'team/team_g_mony_support/$1';
// انهاءمهمة عضو من اعضاء فرقة جمع التبرعات 
$route['Admin/Team_g_Mony_support_done/(:any)'] = 'team/t_g_mony_support_done/$1';
//حذف توكيل المهمة لعضو من اعضاء فرقة جمع التبرعات 
$route['Admin/Team_g_Mony_support_delete/(:any)'] = 'team/t_g_mony_support_delete/$1';
// عرض جميع اعضاء الفرق رعاية  الايتام 
$route['Admin/Show_Team_k_Orphan'] = 'team/show_t_k_orphan';
// عرض او اعطاء مهام الى احد الفرق رعاية  الايتام 
$route['Admin/Team_K_Task/(:any)'] = 'team/t_k_task/$1';
//   اعطاء مهام الى احد الفرق رعاية  الايتام 
$route['Admin/Add_T_Task/(:any)'] = 'team/add_task/$1';
//حذف توكيل المهمة  احد الفرق رعاية  الايتام  
$route['Admin/Delete_T_Task/(:any)'] = 'team/delete_task/$1';
// حذف احد اعضاء الفرق جمع التبرعات
$route['Admin/Delete_Team_M/(:any)'] = 'team/team_delete_m/$1';
// حذف احد اعضاء فرق رعاية الايتام
$route['Admin/Delete_Team_k/(:any)'] = 'team/team_delete_k/$1';

// طلبات الانضمام الى الفرق
$route['Admin/Show_Team_Request'] = 'team/show_t_request';
//قبول طلب الانضمام كاحد الفرق التطوعية
$route['Admin/Update_Team_Request/(:any)'] = 'team/update_t_request/$1';

//###############[E_team]################ 

//###############[S_support]################ 
// عرض جميع التبرعات  المخصصة
$route['Admin/Show_support'] = 'User/show_support';
// عرض جميع التبرعات غير المخصصة
$route['Admin/Show_support_not'] = 'User/show_support_not';
//  حذف تبرع
$route['Admin/Delete_support/(:any)'] = 'User/delete_support/$1';
//  عرض تبرع واحد 
$route['Admin/Show_one_support/(:any)'] = 'User/show_one_support/$1';
//  اعطاء مهمة التبرع الى احد اعضاء الفرق جمع التبرعات
$route['Admin/sp_give_team/(:any)'] = 'User/support_give_team/$1';

//###############[E_support]################ 

//###############[S_Sponsor]################ 
//عرض جميع الكفلاء
$route['Admin/Show_sponsor'] = 'orphan/show_sponsor';
//عرض طلب اضافة ك كفيل
$route['Admin/Show_sponsor_Request'] = 'orphan/show_s_request';
//قبول الطلب وتحديث البيانات 
$route['Admin/Update_s_Request/(:any)'] = 'orphan/update_s_request/$1';
//حذف الطلب او الكفيل
$route['Admin/Delete_sponsor/(:any)'] = 'orphan/delete_sponsor/$1';
//###############[E_Sponsor]################ 

//###############[main  home page]################
// انضمام الى المؤسسة
$route['Join_Us'] = 'home/joinus';
//اخر الاخبار
$route['News/(:any)'] = 'home/news/$1';

//المجلة
$route['Gallary'] = 'home/gallary';
//من نحن
$route['About_Us'] = 'home/aboutus';
// تواصل معنا
$route['Contact_Us'] = 'home/contactus';
//  دعم الايتام
$route['Support'] = 'home/support';
// كفالة الايتام
$route['Sponsor'] = 'home/sponsor';
// المجموعات التطوعية
$route['Team'] = 'home/team';
//###############[main  home page]################

