<div class="control">
    <h2>Cập nhật người dùng</h2>
    <div>
        <form action="index.php?view=edit_user" method="post" enctype="multipart/form-data">
            <?php
            $detail_user = $data['detail_user'];
            ?>
            <input type="hidden" name="iduser" value="<?= $detail_user['id'] ?>">

            <label for="">Trạng thái tài khoản</label>
            <select name="status" id="status" class="form-control">
                <?php
                $status = '';
                if (isset($detail_user['trang_thai']) && $detail_user['trang_thai'] === 1) {
                    $status .= '<option value="1" selected>Có</option>';
                    $status .= '<option value="0">Không</option>';
                } else {
                    $status .= '<option value="1">Có</option>';
                    $status .= '<option value="0" selected>Không</option>';
                }
                echo $status;
                ?>
            </select>

            <label for="">Trạng thái admin</label>
            <select name="admin" id="admin" class="form-control">
                <?php
                $admin = '';
                if (isset($detail_user['admin']) && $detail_user['admin'] === 1) {
                    $admin .= '<option value="1" selected>Có</option>';
                    $admin .= '<option value="0">Không</option>';
                } else {
                    $admin .= '<option value="1">Có</option>';
                    $admin .= '<option value="0" selected>Không</option>';
                }
                echo $admin;
                ?>
            </select>
            <button type="submit" name="sub">Cập nhật người dùng</button>
        </form>
    </div>
</div>