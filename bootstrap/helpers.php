<?php
/**
 * 将当前请求的路由名称转换为css类名称
 */
function route_class()
{
  return str_replace('.', '-', Route::currentRouteName());
}
