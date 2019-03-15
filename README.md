# tms_test

In order to make this functional as a standalone application, please follow next steps:
<ol>
<li>sudo git init</li>
<li>sudo git clone https://github.com/KnjazMiljan/tms_test.git</li>
<li>sudo chown -R www-data:www-data tms_test/</li>
<li>sudo chmod 775 tms_test/storage/logs</li>
<li>sudo chmod 775 tms_test/bootstrap/cache</li>
<li>sudo chmod 775 tms_test/storage/framework/sessions</li>
<li>sudo chmod 775 tms_test//storage/framework/views</li>
<li>cd tms_test</li>
<li>php artisan serve</li>
<ol>
