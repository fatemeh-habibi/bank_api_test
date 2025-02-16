<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                direction: rtl;
            }
        </style>
         <style type="text/css">
           a {text-decoration: none; color:red}
           a:hover {text-decoration: underline;}
     </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="justify-center pt-8 sm:justify-start sm:pt-0">
                    <p><b> شرح کلی پروژه:￼ </b></p>
                    <p>
                    فرض کنید قرار است یکی از API های یک سیستم بانکی را توسعه بدهید.لطفا با استفاده از آخرین نسخه فریم ورک لاراول سیستمی فوق را با شرایط زیر پیاده سازی کنید:
                    </p>
                    <p><b>فرضیات پروژه :￼ </b></p>
                    <ul>
                        <li>
                            هر کاربر در سیستم می تواند یک شماره موبایل و چندین شماره حساب و به ازای هر شماره حساب هم چند شماره کارت داشته باشد. 
                        </li>
                        <li>
                            در تما ی موارد در صورت نیاز میتوانید از مقاد ر فرضی استفاده کنید. م لا اگر نیاز هست که یک API KEY از یک سرویس داش ه باشید میتوانید آن را با مقدار فرضی  کم ل کنید و پروژه را تحو ل نما ید. م لا اگر شما نیاز به یک کلید از سرویس کاوه نگار داخل پروژه دارید  ی توانید ا ن کلید را صرفا یه مقدار دلخواه در نظر بگ رید:
                            ○ KAVEHNEGAR_API_KEY = 12345
                        <li>
                    <ul>
                    <p><b>نیازمندی پروژه :￼ </b></p>
                    <ul>
                        <li>تمام Migration های مورد نیاز پروژه را خودتان اضافه کنید. </li>
                        <li>تمام Seeder های مورد نیاز پروژه را جهت سهولت نصب، راه اندازی و تست پروژه خودتان اضافه کنید.</li>
                        <li>یک API بنویسید که شماره کارت مبدا و مقصد را بگیرد و در صورت کفایت موجودی عملیات انتقال مبلغ را انجام دهد.</li>
                            <ul>
                                <li>
                                    شماره کارت باید اعتبار سنجی )Validate( شود و فقط یک شماره کارت معتبر را بپذیرد. پس شماره کارت هایی که در سیستم بانکی ایران معتبر نیستن را سیستم شما نباید بپذیرد مثلا  1234-1234-1234-1234 نامعتبر است.
                                </li>
                                <li>حداقل مبلغ برای انجام تراکنش ۱۰۰۰ تومان و حداکثر ۵۰ میلیون تومان است.</li>
                                <li>انجام هر تراکنش ۵۰۰ تومان کارمزد برای بانک شما به همراه دارد که باید  کارمزدها را یک جدول جداگانه نگهداری کنید. </li>
                                <li>
                                    این API باید قابلیت پردازش شماره کارت و مبلغ با اعداد انگلیسی و فارسی و عربی را داشته باشد و کلاینت را مجبور نکن که حتما اعداد را انگلیسی ارسال کند.
                                </li>
                                <li>در جداول مرتبط با تراکنش های انجام شده, هیج ارتباط مستقیمی به کاربر نباید وجود داشته باشد. تنها ارتباط مستقیم با کارت مجاز است. </li>
                            </ul>
                        <li>بعد از انجام این تراکنش باید برای هر دو کاربر مبدا و مقصد پیامک کاهش/افزایش موجودی ارسال شود.</li>
                            <ul>
                                <li>متن این پیامک باید براحتی توسط توسعه دهندگان بعدی قابل  باشد.</li>
                                <li>سیستم باید امکان ارسال پیامک از سرویس شرکتهای پیامک زیر را داشته باشد:</li>
                                    <ul> <li> https://kavenegar.com/rest.html </li><li>https://ghasedaksms.com/lab</li></ul>
                                <li>
                        سیستم باید طوری نوشته شود که قابلیت افزودن سرویس جدید ارسال پیامک از شرکتهای جدید را داشته باشید مثلا اگر در آینده خواستیم سرویس ارسال پیامک از شرکت sms.ir را هم اضافه کنیم براحتی و با کمترین تغییرات بتوانیم این کار را انجام دهیم.
                                </li>
                            </ul>
                        <li>یک API طراحی کنید که اطلاعات سه کاربری که در ۱۰ دقیقه ی اخیر بیشترین تراکنش را دارند, به همراه لیست ۱۰ تراکنش آخر هر کدام, بازگرداند.</li>
                        <b>ملاحظات:</b>
                        <li>حتما API باید بصورت REST توسعه داده شود. </li>
                        <li> مکانیزم احراز هویت API مهم نیست و میتوانید آن را در نظر نگیرید . </li>
                        <li> رعایت تمام استانداردهای برنامه نویسی الزامی است. </li>
                        <li> استفاده از best peractise  است. </li>
                        <li> استفاده از Design Pattern ها در صورت امکان الزامی است.</li>
                        <li> پروژه باید بصورت repository روی سایت Github یا Gitlab تحویل داده شود. </li>
                        <li> هر دو وب سایت کاوه نگار و قاصدک بعد از ثبت نام یک مبلغ ناچیز برای تست در پنل کاربر شارژ میکنند و نیازی به هزینه کردن وجود ندارد. نهایتا هم کیفیت کد بررسی خواهد شد و نیاز به ارسال واقعی پیامک وجود ندارد.</li>
                        <li>نوشتن تست الزامی نیست اما قطعا امتیاز اضافه به همراه خواهد داشت.</li>
                    </ul>
                </div>
                <div style="direction:ltr;">
                    <p>How to Run:</p>
                    <ol>
                        <li>docker-compose up -d </li>
                        <li>docker-compose exec laravel php artisan migrate:fresh --seed </li>
                        <li>docker-compose exec laravel php artisan config:clear </li>
                        <li>docker-compose exec laravel php artisan passport:install</li>
                        <li>docker-compose exec laravel php artisan key:generate</li>
                        <li>docker-compose exec laravel php artisan config:cache</li>
                        <li>docker-compose exec laravel php artisan swagger:ge</li>
                        <li> Document: <a target="_blank" href={{env('DATABASE_URL')}}"/api/documentation"> api/documentation </a> </li>
                    </ol>
                    Git: <a target="_blank" href="https://github.com/fatemeh-habibi/bank_api_test.git"> Git </a>

                </div>
            </div>
        </div>
    </body>
</html>
