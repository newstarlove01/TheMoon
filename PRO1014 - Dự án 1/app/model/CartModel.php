<?php

class CartModel
{
    private $db;
    function __construct()
    {
        $this->db = new Database();
    }

    function createOrder($data)
    {
        $sql = "INSERT INTO orders(user_id, total_price, status, created_at) VALUES (?, ?, ?, ?)";
        $param = [$data['user_id'], $data['total_price'], $data['status'], $data['created_at']];
        return $this->db->insert($sql, $param);
    }

    function addOrderDetail($orderId, $productId, $size, $quantity, $price)
    {
        // SQL để thêm chi tiết đơn hàng vào bảng 'order_details'
        $sql = "INSERT INTO order_details (order_id, product_id, size, quantity, price)
            VALUES (?, ?, ?, ?, ?)";

        // Mảng tham số để thay thế vào dấu hỏi trong câu lệnh SQL
        $param = [$orderId, $productId, $size, $quantity, $price];

        // Thực hiện câu lệnh SQL bằng phương thức 'insert' của lớp database
        return $this->db->insert($sql, $param);
    }
    function updateOrderTotal($orderId)
    {
        // SQL để tính tổng giá trị đơn hàng từ bảng 'order_details'
        $sql = "SELECT SUM(quantity * price) AS total FROM order_details WHERE order_id = ?";

        // Mảng tham số để thay thế vào dấu hỏi trong câu lệnh SQL
        $param = [$orderId];

        // Thực hiện câu lệnh SQL và lấy kết quả
        $result = $this->db->getAll($sql, $param);

        // Kiểm tra nếu có kết quả và lấy giá trị tổng cộng
        $total = $result[0]['total'];

        // SQL để cập nhật tổng giá trị đơn hàng vào bảng 'orders'
        $updateSql = "UPDATE orders SET total_price = ? WHERE id = ?";

        // Cập nhật tổng giá trị đơn hàng
        $updateParam = [$total, $orderId];
        return $this->db->update($updateSql, $updateParam);
    }
}
