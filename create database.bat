@echo off
echo Executing queries.sql...
mysql -u root -proot -Dproject < sql/runner.sql
echo DONE
pause