
            <div class="main-content">
                <h3 class="title-page">
                    Thành viên
                </h3>
                <div class="d-flex justify-content-end">
                    <a href="index.php?pg=adduser" class="btn btn-primary mb-2">Thêm thành viên</a>
                </div>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên đầy đủ</th>
                            <th>email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>role</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          
                        </tr>
                        <?php 
                        $i = 0;
                            foreach($alluser as $item){
                                $i++;
                                $linkdelete='index.php?pg=user_delete&id='.$item['id'].'';
                                $linkedit='index.php?pg=user_update&id='.$item['id'].'';
                                echo '  <tr> <td>' .$i.'</td>
                                <td>'.$item['fullname'].'</td>
                                <td>'.$item['email'].'</td>
                                <td>'.$item['phone'].'</td>
                                <td>'.$item['address'].'</td>
                                <td>'.$item['role'].'</td>
                               
                                <td style="width: 200px ">
                                   
                                <a href="'.$linkedit.'" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                                <a href="'.$linkdelete.'" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Xóa</a>
                                </td> </tr>';
                            }
                            
                            
                            ?>
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Tên đầy đủ</th>
                            <th>email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>role</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <script>
        new DataTable('#example');
    </script>
