cmake_minimum_required(VERSION 3.16)
project(warehouse_inventory_system LANGUAGES CXX)

set(CMAKE_CXX_STANDARD 17)
set(CMAKE_CXX_STANDARD_REQUIRED ON)

add_executable(warehouse_inventory src/main.cpp)
