<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/22
 * Time: 14:19
 */
//执行函数
getImg();

//函数内容
function getImg()
{

    $img = $_POST['sendData'];
    $path = "../upload/";
    if (!is_dir($path)) {
        mkdir($path, 0777);
    }
    $prefix = 'zk_';
    $output_file = $prefix . time() . rand(100, 999) . '.jpg';
    $path = $path . $output_file;
//  创建将数据流文件写入我们创建的文件内容中
    $ifp = fopen($path, "wb");
    $is_ok = fwrite($ifp, base64_decode($img));
    fclose($ifp);
    if ($is_ok) {
        echo json_encode(array('msg' => "上传成功", "status" => 1, "data" => $path));
    } else {
        echo json_encode(array('msg' => "上传失败", "status" => 0));
    }
}
