<?php
session_start();

// カートに入っている商品情報を取得
$cart_items = array();
if (isset($_SESSION["cart"])) {
    foreach ($_SESSION["cart"] as $item_id => $quantity) {
        // $item_id を使ってデータベースから商品情報を取得し、配列に追加
        // ここでの例では、ダミーの商品情報を配列に追加する
        $cart_items[] = array(
            "item_id" => $item_id,
            "quantity" => $quantity,
            "item_name" => "商品名",
            "item_price" => 9999
        );
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <!-- ... -->
</head>
<body>
    <header id="header" class="wrapper">
        <!-- ... -->
    </header>
    
    <main>
        <div class="content wrapper">
            <h1 class="page-title">カート</h1>
            <table>
                <tr>
                    <th>商品名</th>
                    <th>数量</th>
                    <th>価格</th>
                </tr>
                <?php foreach ($cart_items as $cart_item) : ?>
                    <tr>
                        <td><?php echo $cart_item["item_name"]; ?></td>
                        <td><?php echo $cart_item["quantity"]; ?></td>
                        <td><?php echo $cart_item["item_price"] * $cart_item["quantity"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </main>
    
    <!-- ... -->
</body>
</html>
