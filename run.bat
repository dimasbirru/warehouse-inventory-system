@echo off
cd /d "%~dp0"
title Warehouse Management System
color 0A

echo ==========================================
echo       MEMULAI OPERASIONAL GUDANG (C++)
echo ==========================================
echo.

if exist warehouse.exe del warehouse.exe

echo [1/3] Compiling C++...
g++ -std=c++11 -Wall src/main.cpp -o warehouse.exe

if %ERRORLEVEL% NEQ 0 (
    echo.
    echo [ERROR] Compile gagal! Periksa kode kamu.
    pause
    exit /b
)

echo [2/3] Menjalankan aplikasi C++...
warehouse.exe

echo.
echo ==========================================
echo   PROGRAM C++ SELESAI. MENJALANKAN ANALITIK...
echo ==========================================
echo.

echo [3/3] Menjalankan laporan analitik Python...
python analytics\report.py

echo.
echo ==========================================
pause