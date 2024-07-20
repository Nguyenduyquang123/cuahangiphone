
            <div class="main-content">
                <h3 class="title-page">
                    Danh mục
                </h3>
                <div class="d-flex justify-content-end">
                    <a href="index.php?pg=addcaterogies" class="btn btn-primary mb-2">Thêm danh mục</a>
                </div>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Link</th>
                            <th>hiện thị</th>
                          
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach($alldm as $item){
                            $i++;
                            $linkedit='index.php?pg=caterogies_update&id='.$item['id'].'';
                            $linkdelete='index.php?pg=caterogies_delete&id='.$item['id'].'';

                            echo ' <tr>
                            <td>'.$i.'</td>
                            <td>'.$item['name'].'</td>
                            <td>'.$item['link'].'</td>
                            <td>'.$item['hienthi'].'</td>
                            
                            <td style="width: 200px ">
                                <a href="'.$linkedit.'" class="btn btn-warning"><i
                                        class="fa-solid fa-pen-to-square"></i> Sửa</a>
                                <a href="'.$linkdelete.'" class="btn btn-danger"><i
                                        class="fa-solid fa-trash"></i> Xóa</a>
                            </td>
                        </tr>';
                        }
                        ?>
                       
                       
                      
                    </tbody>
                    <tfoot>
                        <tr>
                        <th>id</th>
                            <th>Name</th>
                            <th>Link</th>
                            <th>hiện thị</th>
                          
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <script src="assets/js/main.js"></script>
    <script>
        new DataTable('#example');
    </script>
