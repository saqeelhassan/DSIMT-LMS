<?php

use App\Http\Controllers\Admin\BatchController as AdminBatchController;
use App\Http\Controllers\Admin\BroadcastController as AdminBroadcastController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EnrollmentController as AdminEnrollmentController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\DefaulterController as AdminDefaulterController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\Admin\InvoiceController as AdminInvoiceController;
use App\Http\Controllers\Admin\RegistrationController as AdminRegistrationController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DSIMTController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Instructor\AssignmentController as InstructorAssignmentController;
use App\Http\Controllers\Instructor\AttendanceController as InstructorAttendanceController;
use App\Http\Controllers\Instructor\ContentController as InstructorContentController;
use App\Http\Controllers\Instructor\CourseController as InstructorCourseController;
use App\Http\Controllers\Instructor\DashboardController as InstructorDashboardController;
use App\Http\Controllers\Instructor\ExamController as InstructorExamController;
use App\Http\Controllers\Instructor\ProgressController as InstructorProgressController;
use App\Http\Controllers\Staff\DashboardController as StaffDashboardController;
use App\Http\Controllers\Student\AssignmentController as StudentAssignmentController;
use App\Http\Controllers\Student\ClassroomController as StudentClassroomController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Student\ExamController as StudentExamController;
use App\Http\Controllers\Student\ProfileController as StudentProfileController;
use App\Http\Controllers\Student\QuizController as StudentQuizController;
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashboardController;
use App\Http\Controllers\SuperAdmin\AuditLogController as SuperAdminAuditLogController;
use App\Http\Controllers\SuperAdmin\BranchController as SuperAdminBranchController;
use App\Http\Controllers\SuperAdmin\ExpenseController as SuperAdminExpenseController;
use App\Http\Controllers\SuperAdmin\RegistrationApprovalController as SuperAdminRegistrationApprovalController;
use App\Http\Controllers\SuperAdmin\SettingsController as SuperAdminSettingsController;
use App\Http\Controllers\SuperAdmin\UserController as SuperAdminUserController;
use App\Http\Controllers\SuperAdmin\ViewAsController as SuperAdminViewAsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| LMS: Login → Dashboard (role-based)
|--------------------------------------------------------------------------
*/

// Home - DSIMT Main Website (default)
Route::get('/', [DSIMTController::class, 'index'])->name('index');

// LMS entry - redirect to login
Route::get('/lms', fn () => redirect()->route('login'))->name('lms.index');
// When app is in a subdirectory (e.g. APP_URL=http://localhost/LMS-Digi-Sindh/public), also match /path/lms
$lmsPath = trim(parse_url(config('app.url'), PHP_URL_PATH) ?? '', '/');
if ($lmsPath !== '') {
    Route::get($lmsPath . '/lms', fn () => redirect()->route('login'));
}

// Login and Register
Route::get('/sign-in', [AuthController::class, 'showSignIn'])->name('auth.sign-in');
Route::get('/login', [AuthController::class, 'showSignIn'])->name('login');
Route::post('/sign-in', [AuthController::class, 'login'])->name('auth.login');
Route::get('/sign-up/student', [AuthController::class, 'showSignUpStudent'])->name('auth.sign-up.student');
Route::post('/sign-up/student', [AuthController::class, 'registerStudent'])->name('auth.register.student');
Route::get('/sign-up/staff', [AuthController::class, 'showSignUpStaff'])->name('auth.sign-up.staff');
Route::post('/sign-up/staff', [AuthController::class, 'registerStaff'])->name('auth.register.staff');
Route::get('/pending-approval', [AuthController::class, 'showPendingApproval'])->name('auth.pending-approval');
Route::post('/sign-out', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');

// Forgot password (Laravel route names for built-in notification)
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/password/reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.update');

// Single dashboard: redirects to super-admin / admin / instructor / student by role
Route::get('/dashboard', DashboardController::class)->name('dashboard')->middleware('auth');

// Account (Edit Profile, Account Settings, Help) – for logged-in users with admin/super-admin layout
Route::middleware('auth')->group(function () {
    Route::get('/account/profile', [AccountController::class, 'editProfile'])->name('account.profile.edit');
    Route::put('/account/profile', [AccountController::class, 'updateProfile'])->name('account.profile.update');
    Route::get('/account/settings', [AccountController::class, 'accountSettings'])->name('account.settings');
    Route::put('/account/settings/password', [AccountController::class, 'updatePassword'])->name('account.settings.password');
    Route::get('/help', [AccountController::class, 'help'])->name('help');
});

// Super Admin (SuperAdmin role only – full control, view all users)
Route::prefix('super-admin')->name('super-admin.')->middleware(['auth', 'role:SuperAdmin'])->group(function () {
    Route::get('/', [SuperAdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [SuperAdminUserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [SuperAdminUserController::class, 'create'])->name('users.create');
    Route::post('/users', [SuperAdminUserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [SuperAdminUserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [SuperAdminUserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [SuperAdminUserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/assign-role', [SuperAdminUserController::class, 'assignRole'])->name('users.assign-role');
    Route::get('/registrations', [SuperAdminRegistrationApprovalController::class, 'index'])->name('registrations.index');
    Route::post('/registrations/{user}/approve', [SuperAdminRegistrationApprovalController::class, 'approve'])->name('registrations.approve');
    Route::post('/registrations/{user}/reject', [SuperAdminRegistrationApprovalController::class, 'reject'])->name('registrations.reject');
    Route::resource('branches', SuperAdminBranchController::class)->names('branches');
    Route::get('/settings', [SuperAdminSettingsController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SuperAdminSettingsController::class, 'update'])->name('settings.update');
    Route::get('/expenses', [SuperAdminExpenseController::class, 'index'])->name('expenses.index');
    Route::get('/expenses/create', [SuperAdminExpenseController::class, 'create'])->name('expenses.create');
    Route::post('/expenses', [SuperAdminExpenseController::class, 'store'])->name('expenses.store');
    Route::get('/audit-logs', [SuperAdminAuditLogController::class, 'index'])->name('audit-logs.index');
    Route::post('/users/{user}/block', [SuperAdminUserController::class, 'block'])->name('users.block');
    Route::post('/users/{user}/unblock', [SuperAdminUserController::class, 'unblock'])->name('users.unblock');
    Route::post('/view-as', [SuperAdminViewAsController::class, 'store'])->name('view-as.store');
    Route::get('/exit-view-as', [SuperAdminViewAsController::class, 'destroy'])->name('view-as.destroy');
});

// Courses (public) - only list and detail
Route::prefix('courses')->name('courses.')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('index');
    Route::get('/detail/{course}', [CourseController::class, 'detail'])->name('detail');
});
Route::post('/courses/{course}/enroll', [EnrollmentController::class, 'store'])->name('courses.enroll')->middleware('auth');

// Admin (Admin with assigned permissions, Staff, or SuperAdmin)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:Admin,Staff,SuperAdmin'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/enrollments', [AdminEnrollmentController::class, 'index'])->name('enrollments.index')->middleware('admin.permission:enrollments.view');
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index')->middleware('admin.permission:users.view');
    Route::get('/courses', [AdminCourseController::class, 'index'])->name('courses.index')->middleware('admin.permission:courses.manage');
    Route::get('/courses/create', [AdminCourseController::class, 'create'])->name('courses.create')->middleware('admin.permission:courses.create');
    Route::post('/courses', [AdminCourseController::class, 'store'])->name('courses.store')->middleware('admin.permission:courses.create');
    Route::get('/courses/{course}/edit', [AdminCourseController::class, 'edit'])->name('courses.edit')->middleware('admin.permission:courses.create');
    Route::put('/courses/{course}', [AdminCourseController::class, 'update'])->name('courses.update')->middleware('admin.permission:courses.create');
    Route::redirect('/courses/category', '/admin/courses', 301);
    Route::get('/courses/{course}', [AdminCourseController::class, 'show'])->name('courses.show')->middleware('admin.permission:courses.manage');
    Route::get('/registrations', [AdminRegistrationController::class, 'index'])->name('registrations.index')->middleware('admin.permission:registrations.approve');
    Route::post('/registrations/{user}/approve', [AdminRegistrationController::class, 'approve'])->name('registrations.approve')->middleware('admin.permission:registrations.approve');
    Route::post('/registrations/{user}/reject', [AdminRegistrationController::class, 'reject'])->name('registrations.reject')->middleware('admin.permission:registrations.approve');

    Route::get('/batches', [AdminBatchController::class, 'index'])->name('batches.index')->middleware('admin.permission:batches.manage');
    Route::get('/batches/create', [AdminBatchController::class, 'create'])->name('batches.create')->middleware('admin.permission:batches.manage');
    Route::post('/batches', [AdminBatchController::class, 'store'])->name('batches.store')->middleware('admin.permission:batches.manage');
    Route::get('/batches/{batch}/edit', [AdminBatchController::class, 'edit'])->name('batches.edit')->middleware('admin.permission:batches.manage');
    Route::put('/batches/{batch}', [AdminBatchController::class, 'update'])->name('batches.update')->middleware('admin.permission:batches.manage');
    Route::get('/batches/{batch}/timetable', [AdminBatchController::class, 'timetable'])->name('batches.timetable')->middleware('admin.permission:batches.manage');
    Route::post('/batches/{batch}/timetable', [AdminBatchController::class, 'timetable'])->name('batches.timetable.store')->middleware('admin.permission:batches.manage');

    Route::get('/invoices', [AdminInvoiceController::class, 'index'])->name('invoices.index')->middleware('admin.permission:fees.manage');
    Route::post('/invoices/generate-vouchers', [AdminInvoiceController::class, 'generateVouchers'])->name('invoices.generate-vouchers')->middleware('admin.permission:fees.manage');
    Route::get('/invoices/create', [AdminInvoiceController::class, 'create'])->name('invoices.create')->middleware('admin.permission:fees.manage');
    Route::post('/invoices', [AdminInvoiceController::class, 'store'])->name('invoices.store')->middleware('admin.permission:fees.manage');
    Route::get('/invoices/{invoice}', [AdminInvoiceController::class, 'show'])->name('invoices.show')->middleware('admin.permission:fees.manage');
    Route::post('/invoices/{invoice}/payment', [AdminInvoiceController::class, 'recordPayment'])->name('invoices.record-payment')->middleware('admin.permission:fees.manage');

    Route::get('/defaulters', [AdminDefaulterController::class, 'index'])->name('defaulters.index')->middleware('admin.permission:fees.manage');
    Route::post('/defaulters/{user}/disable', [AdminDefaulterController::class, 'disableAccess'])->name('defaulters.disable')->middleware('admin.permission:fees.manage');
    Route::post('/defaulters/{user}/enable', [AdminDefaulterController::class, 'enableAccess'])->name('defaulters.enable')->middleware('admin.permission:fees.manage');

    Route::get('/inquiries', [AdminInquiryController::class, 'index'])->name('inquiries.index')->middleware('admin.permission:inquiries.manage');
    Route::get('/inquiries/create', [AdminInquiryController::class, 'create'])->name('inquiries.create')->middleware('admin.permission:inquiries.manage');
    Route::post('/inquiries', [AdminInquiryController::class, 'store'])->name('inquiries.store')->middleware('admin.permission:inquiries.manage');
    Route::get('/inquiries/{inquiry}/edit', [AdminInquiryController::class, 'edit'])->name('inquiries.edit')->middleware('admin.permission:inquiries.manage');
    Route::put('/inquiries/{inquiry}', [AdminInquiryController::class, 'update'])->name('inquiries.update')->middleware('admin.permission:inquiries.manage');
    Route::get('/inquiries/{inquiry}/convert', [AdminInquiryController::class, 'convertForm'])->name('inquiries.convert')->middleware('admin.permission:inquiries.manage');
    Route::post('/inquiries/{inquiry}/convert', [AdminInquiryController::class, 'convert'])->name('inquiries.convert.store')->middleware('admin.permission:inquiries.manage');

    Route::get('/broadcasts', [AdminBroadcastController::class, 'index'])->name('broadcasts.index')->middleware('admin.permission:notifications.manage');
    Route::get('/broadcasts/create', [AdminBroadcastController::class, 'create'])->name('broadcasts.create')->middleware('admin.permission:notifications.manage');
    Route::post('/broadcasts', [AdminBroadcastController::class, 'store'])->name('broadcasts.store')->middleware('admin.permission:notifications.manage');
});

// Staff (Staff or SuperAdmin)
Route::prefix('staff')->name('staff.')->middleware(['auth', 'role:Staff,SuperAdmin'])->group(function () {
    Route::get('/', [StaffDashboardController::class, 'index'])->name('dashboard');
});

// Instructor (teach courses; Instructor, Admin, or SuperAdmin)
Route::prefix('instructor')->name('instructor.')->middleware(['auth', 'role:Instructor,Admin,SuperAdmin'])->group(function () {
    Route::get('/', [InstructorDashboardController::class, 'index'])->name('dashboard');
    Route::get('/courses', [InstructorCourseController::class, 'index'])->name('manage-course');
    Route::get('/courses/create', [InstructorCourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [InstructorCourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{course}/edit', [InstructorCourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{course}', [InstructorCourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{course}', [InstructorCourseController::class, 'destroy'])->name('courses.destroy');
    Route::get('/courses/{course}/exams', [InstructorExamController::class, 'index'])->name('exams.index');
    Route::get('/courses/{course}/exams/create', [InstructorExamController::class, 'create'])->name('exams.create');
    Route::post('/courses/{course}/exams', [InstructorExamController::class, 'store'])->name('exams.store');
    Route::get('/courses/{course}/exams/{exam}/submissions', [InstructorExamController::class, 'submissions'])->name('exams.submissions');
    Route::get('/courses/{course}/exams/{exam}/mark/{user}', [InstructorExamController::class, 'markForm'])->name('exams.mark-form');
    Route::post('/courses/{course}/exams/{exam}/mark/{user}', [InstructorExamController::class, 'mark'])->name('exams.mark');
    Route::get('/courses/{course}/attendance', [InstructorAttendanceController::class, 'index'])->name('attendance.index');
    Route::get('/courses/{course}/attendance/take', [InstructorAttendanceController::class, 'take'])->name('attendance.take');
    Route::get('/courses/{course}/attendance/take/{date}', [InstructorAttendanceController::class, 'take'])->name('attendance.take-date');
    Route::post('/courses/{course}/attendance', [InstructorAttendanceController::class, 'store'])->name('attendance.store');
    Route::get('/courses/{course}/attendance/{date}', [InstructorAttendanceController::class, 'view'])->name('attendance.view');
    Route::get('/courses/{course}/content', [InstructorContentController::class, 'index'])->name('content.index');
    Route::get('/courses/{course}/content/create', [InstructorContentController::class, 'create'])->name('content.create');
    Route::post('/courses/{course}/content', [InstructorContentController::class, 'store'])->name('content.store');
    Route::get('/courses/{course}/content/{content}/edit', [InstructorContentController::class, 'edit'])->name('content.edit');
    Route::put('/courses/{course}/content/{content}', [InstructorContentController::class, 'update'])->name('content.update');
    Route::delete('/courses/{course}/content/{content}', [InstructorContentController::class, 'destroy'])->name('content.destroy');
    Route::get('/courses/{course}/assignments', [InstructorAssignmentController::class, 'index'])->name('assignments.index');
    Route::get('/courses/{course}/assignments/create', [InstructorAssignmentController::class, 'create'])->name('assignments.create');
    Route::post('/courses/{course}/assignments', [InstructorAssignmentController::class, 'store'])->name('assignments.store');
    Route::get('/courses/{course}/assignments/{assignment}/submissions', [InstructorAssignmentController::class, 'submissions'])->name('assignments.submissions');
    Route::get('/courses/{course}/assignments/{assignment}/grade/{user}', [InstructorAssignmentController::class, 'gradeForm'])->name('assignments.grade-form');
    Route::post('/courses/{course}/assignments/{assignment}/grade/{user}', [InstructorAssignmentController::class, 'grade'])->name('assignments.grade');
    Route::get('/courses/{course}/progress', [InstructorProgressController::class, 'index'])->name('progress.index');
});

// Student (Student or SuperAdmin)
Route::prefix('student')->name('student.')->middleware(['auth', 'role:Student,SuperAdmin'])->group(function () {
    Route::get('/', [StudentDashboardController::class, 'index'])->name('dashboard');
    Route::get('/courses', [StudentDashboardController::class, 'courseList'])->name('courses');
    Route::get('/course-resume', [StudentDashboardController::class, 'courseResume'])->name('course-resume');
    Route::get('/bookmark', [StudentDashboardController::class, 'bookmark'])->name('bookmark');
    Route::get('/payment-info', [StudentProfileController::class, 'feeStatus'])->name('payment-info');
    Route::get('/quiz', [StudentQuizController::class, 'index'])->name('quiz');
    Route::get('/quiz/{quiz}/start', [StudentQuizController::class, 'start'])->name('quiz.start');
    Route::post('/quiz/{quiz}/submit', [StudentQuizController::class, 'submit'])->name('quiz.submit');
    Route::get('/subscription', [StudentDashboardController::class, 'subscription'])->name('subscription');
    Route::get('/exams', [StudentExamController::class, 'index'])->name('exams.index');
    Route::get('/exams/{exam}/submit', [StudentExamController::class, 'submitForm'])->name('exams.submit-form');
    Route::post('/exams/{exam}/submit', [StudentExamController::class, 'submit'])->name('exams.submit');
    Route::get('/assignments', [StudentAssignmentController::class, 'index'])->name('assignments.index');
    Route::get('/assignments/{assignment}/submit', [StudentAssignmentController::class, 'submitForm'])->name('assignments.submit-form');
    Route::post('/assignments/{assignment}/submit', [StudentAssignmentController::class, 'submit'])->name('assignments.submit');
    Route::get('/courses/{course}/classroom', [StudentClassroomController::class, 'show'])->name('classroom.show');
    Route::post('/classroom/record-progress', [StudentClassroomController::class, 'recordProgress'])->name('classroom.record-progress');
    Route::get('/id-card', [StudentProfileController::class, 'idCard'])->name('id-card');
    Route::get('/fee-status', [StudentProfileController::class, 'feeStatus'])->name('fee-status');
    Route::get('/certificates', [StudentProfileController::class, 'certificates'])->name('certificates');
    Route::get('/certificates/{enrollment}', [StudentProfileController::class, 'certificateShow'])->name('certificates.show');
});

/*
|--------------------------------------------------------------------------
| Digital Sindh Institute (DSIMT) Main Website
|--------------------------------------------------------------------------
*/
Route::prefix('dsimt')->name('dsimt.')->group(function () {
    Route::get('/', [DSIMTController::class, 'index'])->name('index');
    Route::get('/about-us', [DSIMTController::class, 'aboutUs'])->name('about-us');
    Route::get('/contact', [DSIMTController::class, 'contact'])->name('contact');
    Route::get('/courses', fn () => redirect()->route('courses.index'))->name('courses');
    Route::get('/board-courses', [DSIMTController::class, 'boardCourses'])->name('board-courses');
    Route::get('/special-course', [DSIMTController::class, 'specialCourse'])->name('special-course');
    Route::get('/scholarship-course', [DSIMTController::class, 'scholarshipCourse'])->name('scholarship-course');
    Route::get('/merit-scholarship', [DSIMTController::class, 'meritScholarship'])->name('merit-scholarship');
    Route::get('/merit-internships', [DSIMTController::class, 'meritInternships'])->name('merit-internships');
    Route::get('/events', [DSIMTController::class, 'events'])->name('events');
    Route::get('/gallery', [DSIMTController::class, 'gallery'])->name('gallery');
    Route::get('/services', [DSIMTController::class, 'services'])->name('services');
    Route::get('/coming-soon/{id?}', [DSIMTController::class, 'comingSoon'])->name('coming-soon');
    Route::get('/admission/pitp-form', [DSIMTController::class, 'admissionPitpForm'])->name('admission-pitp-form');
    Route::get('/admission/apply', [DSIMTController::class, 'admissionApply'])->name('admission-apply');
    Route::get('/admission/join-us', [DSIMTController::class, 'admissionJoinUs'])->name('admission-join-us');
    Route::get('/404', [DSIMTController::class, 'error404'])->name('404');
    Route::get('/login', [DSIMTController::class, 'login'])->name('login');
    Route::get('/registration', [DSIMTController::class, 'registration'])->name('registration');
});
