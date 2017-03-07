<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户</title>
</head>
<body>
    <?php foreach ($user as $v):?>
        <p><?php echo $v['id'].' ---- '.$v['user'].' ---- '.$v['mobile']; ?></p>
    <?php endforeach;?>
</body>
</html>