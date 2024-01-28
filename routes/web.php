<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get("/", [FrontendController::class, 'index'])->name('frontendindex');


Route::get("/product/{slug}", [FrontendController::class, 'productDetails'])->name('product');

Route::get("/products", [FrontendController::class, 'products'])->name('products');
Route::get("/checkout", function () {
    return view('checkout');
})->name('checkout');







Route::middleware('guest')->group(function () {
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'loginView'])->name('loginView');
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'registerView'])->name('registerView');
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [PagesController::class, 'dashboardsCrmAnalytics'])->name('index');

    Route::get('/dashboard/elements/avatar', [PagesController::class, 'elementsAvatar'])->name('elements/avatar');
    Route::get('/dashboard/elements/alert', [PagesController::class, 'elementsAlert'])->name('elements/alert');
    Route::get('/dashboard/elements/button', [PagesController::class, 'elementsButton'])->name('elements/button');
    Route::get('/dashboard/elements/button-group', [PagesController::class, 'elementsButtonGroup'])->name('elements/button-group');
    Route::get('/dashboard/elements/badge', [PagesController::class, 'elementsBadge'])->name('elements/badge');
    Route::get('/dashboard/elements/breadcrumb', [PagesController::class, 'elementsBreadcrumb'])->name('elements/breadcrumb');
    Route::get('/dashboard/elements/card', [PagesController::class, 'elementsCard'])->name('elements/card');
    Route::get('/dashboard/elements/divider', [PagesController::class, 'elementsDivider'])->name('elements/divider');
    Route::get('/dashboard/elements/mask', [PagesController::class, 'elementsMask'])->name('elements/mask');
    Route::get('/dashboard/elements/progress', [PagesController::class, 'elementsProgress'])->name('elements/progress');
    Route::get('/dashboard/elements/skeleton', [PagesController::class, 'elementsSkeleton'])->name('elements/skeleton');
    Route::get('/dashboard/elements/spinner', [PagesController::class, 'elementsSpinner'])->name('elements/spinner');
    Route::get('/dashboard/elements/tag', [PagesController::class, 'elementsTag'])->name('elements/tag');
    Route::get('/dashboard/elements/tooltip', [PagesController::class, 'elementsTooltip'])->name('elements/tooltip');
    Route::get('/dashboard/elements/typography', [PagesController::class, 'elementsTypography'])->name('elements/typography');

    Route::get('/dashboard/components/accordion', [PagesController::class, 'componentsAccordion'])->name('components/accordion');
    Route::get('/dashboard/components/collapse', [PagesController::class, 'componentsCollapse'])->name('components/collapse');
    Route::get('/dashboard/components/tab', [PagesController::class, 'componentsTab'])->name('components/tab');
    Route::get('/dashboard/components/dropdown', [PagesController::class, 'componentsDropdown'])->name('components/dropdown');
    Route::get('/dashboard/components/popover', [PagesController::class, 'componentsPopover'])->name('components/popover');
    Route::get('/dashboard/components/modal', [PagesController::class, 'componentsModal'])->name('components/modal');
    Route::get('/dashboard/components/drawer', [PagesController::class, 'componentsDrawer'])->name('components/drawer');
    Route::get('/dashboard/components/steps', [PagesController::class, 'componentsSteps'])->name('components/steps');
    Route::get('/dashboard/components/timeline', [PagesController::class, 'componentsTimeline'])->name('components/timeline');
    Route::get('/dashboard/components/pagination', [PagesController::class, 'componentsPagination'])->name('components/pagination');
    Route::get('/dashboard/components/menu-list', [PagesController::class, 'componentsMenuList'])->name('components/menu-list');
    Route::get('/dashboard/components/treeview', [PagesController::class, 'componentsTreeview'])->name('components/treeview');
    Route::get('/dashboard/components/table', [PagesController::class, 'componentsTable'])->name('components/table');
    Route::get('/dashboard/components/table-advanced', [PagesController::class, 'componentsTableAdvanced'])->name('components/table-advanced');
    Route::get('/dashboard/components/table-gridjs', [PagesController::class, 'componentsTableGridjs'])->name('components/gridjs');
    Route::get('/dashboard/components/apexchart', [PagesController::class, 'componentsApexchart'])->name('components/apexchart');
    Route::get('/dashboard/components/carousel', [PagesController::class, 'componentsCarousel'])->name('components/carousel');
    Route::get('/dashboard/components/notification', [PagesController::class, 'componentsNotification'])->name('components/notification');
    Route::get('/dashboard/components/extension-clipboard', [PagesController::class, 'componentsExtensionClipboard'])->name('components/extension-clipboard');
    Route::get('/dashboard/components/extension-persist', [PagesController::class, 'componentsExtensionPersist'])->name('components/extension-persist');
    Route::get('/dashboard/components/extension-monochrome', [PagesController::class, 'componentsExtensionMonochrome'])->name('components/extension-monochrome');

    Route::get('/dashboard/forms/layout-v1', [PagesController::class, 'formsLayoutV1'])->name('forms/layout-v1');
    Route::get('/dashboard/forms/layout-v2', [PagesController::class, 'formsLayoutV2'])->name('forms/layout-v2');
    
    // products
    Route::get('/dashboard/product/list', [PagesController::class, 'product_list'])->name('custom/product_list');
    Route::get('/dashboard/product/create', [PagesController::class, 'product_create'])->name('custom/product_create');
    Route::post('/dashboard/product/create', [PagesController::class, 'product_create_store'])->name('custom/product_create_store');
    Route::get('/dashboard/product/{product}/edit', [PagesController::class, 'product_edit'])->name('custom/product_edit');
    Route::put('/dashboard/product/{product}/update', [PagesController::class, 'product_update'])->name('custom/product_edit_update');
    Route::delete('/dashboard/product/{product}/delete', [PagesController::class, 'product_delete'])->name('custom/product_delete');





    Route::get('/dashboard/forms/layout-v3', [PagesController::class, 'formsLayoutV3'])->name('forms/layout-v3');
    Route::get('/dashboard/forms/layout-v4', [PagesController::class, 'formsLayoutV4'])->name('forms/layout-v4');
    Route::get('/dashboard/forms/layout-v5', [PagesController::class, 'formsLayoutV5'])->name('forms/layout-v5');
    Route::get('/dashboard/forms/input-text', [PagesController::class, 'formsInputText'])->name('forms/input-text');
    Route::get('/dashboard/forms/input-group', [PagesController::class, 'formsInputGroup'])->name('forms/input-group');
    Route::get('/dashboard/forms/input-mask', [PagesController::class, 'formsInputMask'])->name('forms/input-mask');
    Route::get('/dashboard/forms/checkbox', [PagesController::class, 'formsCheckbox'])->name('forms/checkbox');
    Route::get('/dashboard/forms/radio', [PagesController::class, 'formsRadio'])->name('forms/radio');
    Route::get('/dashboard/forms/switch', [PagesController::class, 'formsSwitch'])->name('forms/switch');
    Route::get('/dashboard/forms/select', [PagesController::class, 'formsSelect'])->name('forms/select');
    Route::get('/dashboard/forms/tom-select', [PagesController::class, 'formsTomSelect'])->name('forms/tom-select');
    Route::get('/dashboard/forms/textarea', [PagesController::class, 'formsTextarea'])->name('forms/textarea');
    Route::get('/dashboard/forms/range', [PagesController::class, 'formsRange'])->name('forms/range');
    Route::get('/dashboard/forms/datepicker', [PagesController::class, 'formsDatepicker'])->name('forms/datepicker');
    Route::get('/dashboard/forms/timepicker', [PagesController::class, 'formsTimepicker'])->name('forms/timepicker');
    Route::get('/dashboard/forms/datetimepicker', [PagesController::class, 'formsDatetimepicker'])->name('forms/datetimepicker');
    Route::get('/dashboard/forms/text-editor', [PagesController::class, 'formsTextEditor'])->name('forms/text-editor');
    Route::get('/dashboard/forms/upload', [PagesController::class, 'formsUpload'])->name('forms/upload');
    Route::get('/dashboard/forms/validation', [PagesController::class, 'formsValidation'])->name('forms/validation');

    Route::get('/dashboard/layouts/onboarding-1', [PagesController::class, 'layoutsOnboarding1'])->name('layouts/onboarding-1');
    Route::get('/dashboard/layouts/onboarding-2', [PagesController::class, 'layoutsOnboarding2'])->name('layouts/onboarding-2');
    Route::get('/dashboard/layouts/user-card-1', [PagesController::class, 'layoutsUserCard1'])->name('layouts/user-card-1');
    Route::get('/dashboard/layouts/user-card-2', [PagesController::class, 'layoutsUserCard2'])->name('layouts/user-card-2');
    Route::get('/dashboard/layouts/user-card-3', [PagesController::class, 'layoutsUserCard3'])->name('layouts/user-card-3');
    Route::get('/dashboard/layouts/user-card-4', [PagesController::class, 'layoutsUserCard4'])->name('layouts/user-card-4');
    Route::get('/dashboard/layouts/user-card-5', [PagesController::class, 'layoutsUserCard5'])->name('layouts/user-card-5');
    Route::get('/dashboard/layouts/user-card-6', [PagesController::class, 'layoutsUserCard6'])->name('layouts/user-card-6');
    Route::get('/dashboard/layouts/user-card-7', [PagesController::class, 'layoutsUserCard7'])->name('layouts/user-card-7');
    Route::get('/dashboard/layouts/blog-card-1', [PagesController::class, 'layoutsBlogCard1'])->name('layouts/blog-card-1');
    Route::get('/dashboard/layouts/blog-card-2', [PagesController::class, 'layoutsBlogCard2'])->name('layouts/blog-card-2');
    Route::get('/dashboard/layouts/blog-card-3', [PagesController::class, 'layoutsBlogCard3'])->name('layouts/blog-card-3');
    Route::get('/dashboard/layouts/blog-card-4', [PagesController::class, 'layoutsBlogCard4'])->name('layouts/blog-card-4');
    Route::get('/dashboard/layouts/blog-card-5', [PagesController::class, 'layoutsBlogCard5'])->name('layouts/blog-card-5');
    Route::get('/dashboard/layouts/blog-card-6', [PagesController::class, 'layoutsBlogCard6'])->name('layouts/blog-card-6');
    Route::get('/dashboard/layouts/blog-card-7', [PagesController::class, 'layoutsBlogCard7'])->name('layouts/blog-card-7');
    Route::get('/dashboard/layouts/blog-card-8', [PagesController::class, 'layoutsBlogCard8'])->name('layouts/blog-card-8');
    Route::get('/dashboard/layouts/blog-details', [PagesController::class, 'layoutsBlogDetails'])->name('layouts/blog-details');
    Route::get('/dashboard/layouts/help-1', [PagesController::class, 'layoutsHelp1'])->name('layouts/help-1');
    Route::get('/dashboard/layouts/help-2', [PagesController::class, 'layoutsHelp2'])->name('layouts/help-2');
    Route::get('/dashboard/layouts/help-3', [PagesController::class, 'layoutsHelp3'])->name('layouts/help-3');
    Route::get('/dashboard/layouts/price-list-1', [PagesController::class, 'layoutsPriceList1'])->name('layouts/price-list-1');
    Route::get('/dashboard/layouts/price-list-2', [PagesController::class, 'layoutsPriceList2'])->name('layouts/price-list-2');
    Route::get('/dashboard/layouts/price-list-3', [PagesController::class, 'layoutsPriceList3'])->name('layouts/price-list-3');
    Route::get('/dashboard/layouts/invoice-1', [PagesController::class, 'layoutsInvoice1'])->name('layouts/invoice-1');
    Route::get('/dashboard/layouts/invoice-2', [PagesController::class, 'layoutsInvoice2'])->name('layouts/invoice-2');
    Route::get('/dashboard/layouts/sign-in-1', [PagesController::class, 'layoutsSignIn1'])->name('layouts/sign-in-1');
    Route::get('/dashboard/layouts/sign-in-2', [PagesController::class, 'layoutsSignIn2'])->name('layouts/sign-in-2');
    Route::get('/dashboard/layouts/sign-up-1', [PagesController::class, 'layoutsSignUp1'])->name('layouts/sign-up-1');
    Route::get('/dashboard/layouts/sign-up-2', [PagesController::class, 'layoutsSignUp2'])->name('layouts/sign-up-2');
    Route::get('/dashboard/layouts/error-404-1', [PagesController::class, 'layoutsError4041'])->name('layouts/error-404-1');
    Route::get('/dashboard/layouts/error-404-2', [PagesController::class, 'layoutsError4042'])->name('layouts/error-404-2');
    Route::get('/dashboard/layouts/error-404-3', [PagesController::class, 'layoutsError4043'])->name('layouts/error-404-3');
    Route::get('/dashboard/layouts/error-404-4', [PagesController::class, 'layoutsError4044'])->name('layouts/error-404-4');
    Route::get('/dashboard/layouts/error-401', [PagesController::class, 'layoutsError401'])->name('layouts/error-401');
    Route::get('/dashboard/layouts/error-429', [PagesController::class, 'layoutsError429'])->name('layouts/error-429');
    Route::get('/dashboard/layouts/error-500', [PagesController::class, 'layoutsError500'])->name('layouts/error-500');
    Route::get('/dashboard/layouts/starter-blurred-header', [PagesController::class, 'layoutsStarterBlurredHeader'])->name('layouts/starter-blurred-header');
    Route::get('/dashboard/layouts/starter-unblurred-header', [PagesController::class, 'layoutsStarterUnblurredHeader'])->name('layouts/starter-unblurred-header');
    Route::get('/dashboard/layouts/starter-centered-link', [PagesController::class, 'layoutsStarterCenteredLink'])->name('layouts/starter-centered-link');
    Route::get('/dashboard/layouts/starter-minimal-sidebar', [PagesController::class, 'layoutsStarterMinimalSidebar'])->name('layouts/starter-minimal-sidebar');
    Route::get('/dashboard/layouts/starter-sideblock', [PagesController::class, 'layoutsStarterSideblock'])->name('layouts/starter-sideblock');

    Route::get('/dashboard/apps/chat', [PagesController::class, 'appsChat'])->name('apps/chat');
    Route::get('/dashboard/apps/filemanager', [PagesController::class, 'appsFilemanager'])->name('apps/filemanager');
    Route::get('/dashboard/apps/kanban', [PagesController::class, 'appsKanban'])->name('apps/kanban');
    Route::get('/dashboard/apps/list', [PagesController::class, 'appsList'])->name('apps/list');
    Route::get('/dashboard/apps/mail', [PagesController::class, 'appsMail'])->name('apps/mail');
    Route::get('/dashboard/apps/nft-1', [PagesController::class, 'appsNft1'])->name('apps/nft1');
    Route::get('/dashboard/apps/nft-2', [PagesController::class, 'appsNft2'])->name('apps/nft2');
    Route::get('/dashboard/apps/pos', [PagesController::class, 'appsPos'])->name('apps/pos');
    Route::get('/dashboard/apps/todo', [PagesController::class, 'appsTodo'])->name('apps/todo');
    Route::get('/dashboard/apps/travel', [PagesController::class, 'appsTravel'])->name('apps/travel');

    Route::get('/dashboard/dashboards/crm-analytics', [PagesController::class, 'dashboardsCrmAnalytics'])->name('dashboards/crm-analytics');
    Route::get('/dashboard/dashboards/orders', [PagesController::class, 'dashboardsOrders'])->name('dashboards/orders');
    Route::get('/dashboard/dashboards/crypto-1', [PagesController::class, 'dashboardsCrypto1'])->name('dashboards/crypto-1');
    Route::get('/dashboard/dashboards/crypto-2', [PagesController::class, 'dashboardsCrypto2'])->name('dashboards/crypto-2');
    Route::get('/dashboard/dashboards/banking-1', [PagesController::class, 'dashboardsBanking1'])->name('dashboards/banking-1');
    Route::get('/dashboard/dashboards/banking-2', [PagesController::class, 'dashboardsBanking2'])->name('dashboards/banking-2');
    Route::get('/dashboard/dashboards/personal', [PagesController::class, 'dashboardsPersonal'])->name('dashboards/personal');
    Route::get('/dashboard/dashboards/cms-analytics', [PagesController::class, 'dashboardsCmsAnalytics'])->name('dashboards/cms-analytics');
    Route::get('/dashboard/dashboards/influencer', [PagesController::class, 'dashboardsInfluencer'])->name('dashboards/influencer');
    Route::get('/dashboard/dashboards/travel', [PagesController::class, 'dashboardsTravel'])->name('dashboards/travel');
    Route::get('/dashboard/dashboards/teacher', [PagesController::class, 'dashboardsTeacher'])->name('dashboards/teacher');
    Route::get('/dashboard/dashboards/education', [PagesController::class, 'dashboardsEducation'])->name('dashboards/education');
    Route::get('/dashboard/dashboards/authors', [PagesController::class, 'dashboardsAuthors'])->name('dashboards/authors');
    Route::get('/dashboard/dashboards/doctor', [PagesController::class, 'dashboardsDoctor'])->name('dashboards/doctor');
    Route::get('/dashboard/dashboards/employees', [PagesController::class, 'dashboardsEmployees'])->name('dashboards/employees');
    Route::get('/dashboard/dashboards/workspaces', [PagesController::class, 'dashboardsWorkspaces'])->name('dashboards/workspaces');
    Route::get('/dashboard/dashboards/meetings', [PagesController::class, 'dashboardsMeetings'])->name('dashboards/meetings');
    Route::get('/dashboard/dashboards/project-boards', [PagesController::class, 'dashboardsProjectBoards'])->name('dashboards/project-boards');
    Route::get('/dashboard/dashboards/widget-ui', [PagesController::class, 'dashboardsWidgetUi'])->name('dashboards/widget-ui');
    Route::get('/dashboard/dashboards/widget-contacts', [PagesController::class, 'dashboardsWidgetContacts'])->name('dashboards/widget-contacts');
});
