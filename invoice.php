<?php
include "includes/config.php";

// Get order_id from URL
$order_id = $_GET['order_id'];

// Fetch order details
$order_q = mysqli_query($conn, "SELECT * FROM orders WHERE order_id='$order_id'");
$order = mysqli_fetch_assoc($order_q);

// Fetch order items
$item_q = mysqli_query($conn, "SELECT * FROM order_items WHERE order_id='$order_id'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Invoice #<?php echo $order_id; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        h1 {
            font-size: 40px;
            margin-bottom: 5px;
        }
        .header, .footer {
            width: 100%;
        }
        .header td {
            vertical-align: top;
        }
        .logo {
            font-size: 20px;
            font-weight: bold;
        }
        .inv-no {
            text-align: right;
            font-size: 14px;
        }
        table.items {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }
        table.items th, table.items td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        table.items th {
            background: #f3f3f3;
        }
        .total-row td {
            font-weight: bold;
            font-size: 16px;
        }
        .section-title {
            font-weight: bold;
            margin-top: 20px;
        }
        .grey-line {
            height: 2px;
            background: #eee;
            margin: 25px 0;
        }
    </style>
</head>

<body>

    <table class="header">
        <tr>
            <td class="logo">YOUR LOGO<br>Ecommerce Mobile Shop</td>
            <td class="inv-no">
                NO. <?php echo str_pad($order_id, 6, "0", STR_PAD_LEFT); ?>
            </td>
        </tr>
    </table>

    <h1>INVOICE</h1>

    <p><strong>Date:</strong> <?php echo date("d M, Y", strtotime($order['created_at'])); ?></p>

    <table width="100%">
        <tr>
            <td width="50%">
                <h3>Billed to:</h3>
                <p>
                    <?php echo $order['full_name']; ?><br>
                    <?php echo $order['address']; ?><br>
                    <?php echo $order['email']; ?>
                </p>
            </td>

            <td width="50%">
                <h3>From:</h3>
                <p>
                    Ecommerce Mobile Shop<br>
                    Siliguri<br>
                    +81 12345 6789<br>
                    admin@mail.com
                </p>
            </td>
        </tr>
    </table>

    <div class="grey-line"></div>

    <table class="items">
        <tr>
            <th>Item</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Amount</th>
        </tr>

        <?php while ($item = mysqli_fetch_assoc($item_q)) { ?>
            <tr>
                <td><?php echo $item['product_name']; ?></td>
                <td><?php echo $item['qty']; ?></td>
                <td>₹<?php echo $item['price']; ?></td>
                <td>₹<?php echo $item['total']; ?></td>
            </tr>
        <?php } ?>

        <tr class="total-row">
            <td colspan="3" align="right">Total</td>
            <td>₹<?php echo $order['total_amount']; ?></td>
        </tr>
    </table>

    <br>

    <p><strong>Payment Method:</strong> <?php echo $order['payment_type']; ?></p>
    <p><strong>Note:</strong> Thank you for choosing us!</p>

</body>
</html>
