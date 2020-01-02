<?php
require_once 'DAOPDO.class.php';
$configs=array(
    'dbname'=>'test'
);
$pdo=DAOPDO::getSingleton($configs);
$sql="select * from news ";
$arr=$pdo->fetchAll($sql);
//echo '<pre>';
//print_r($arr);
//echo '</pre>';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    <tr>
        <th>标题</th>
        <th>内容</th>
        <th>描述</th>
    </tr>
    <?php foreach ($arr as $key=>$value){ ?>
    <tr>
        <td><?php echo $value['title'] ?></td>
        <td><?php echo $value['content'] ?></td>
        <td><?php echo $value['descs'] ?></td>
        <td><a id="<?php echo $value['id'] ?>" href="javascript:void(0)">删除</a></td>
    </tr>
    <?php } ?>
</table>
<script src="jquery.min.js"></script>
<script>
    // 隐式迭代
    $("a").click(function () {
        $id=$(this).attr('id');//获取属性值
        $.ajax({
            url:'03.php',
            type:'post',
            data:{id:$id},
            dataType:'json',
            success:function (data) {
                console.log(data);
                if(data.code==0){
                    alert('删除成功');
                }else{
                    alert('删除失败');
                }
            }
        })
    })
    </script>
</body>
</html>
