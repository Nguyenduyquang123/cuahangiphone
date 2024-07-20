<div class="box500">


            <div class="main-content">
                <h3 class="title-page">
                    Sửa Danh Mục
                </h3>
                
                <form class="addPro" action="index.php?pg=caterogies_update1&id=<?=$kqone[0]['id'];?>" method="post" >
                    
                    <div class="form-group">
                        <label for="name">Tên Danh Mục:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên Danh mục" value="<?=$kqone[0]['name'];?>" >
                    </div>
                    <div class="form-group">
                        <label for="name">Dẫn tới</label>
                        <input type="text" class="form-control" name="link" id="name" placeholder="Nhập đường dẫn tới trang"value="<?=$kqone[0]['link'];?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Hiện thị</label>
                        <input type="text" class="form-control" name="hienthi" id="name" placeholder="Nhập hiện thị" value="<?=$kqone[0]['hienthi'];?>">
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" name="btnedit" class="btn btn-primary">Sửa danh mục</button>
                    </div>
                    
                </form>
                <?php
            if(isset(($tb))&&($tb!= "")){echo $tb;} 
            ?>
                
            
            
            </div>
</div>
            <script>
                new DataTable('#example');
            </script>