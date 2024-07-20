<div class="box500">


            <div class="main-content">
                <h3 class="title-page">
                    Thêm Danh Mục
                </h3>
                
                <form class="addPro" action="index.php?pg=addcaterogies" method="post" >
                    
                    <div class="form-group">
                        <label for="name">Tên Danh Mục:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên Danh mục">
                    </div>
                    <div class="form-group">
                        <label for="name">Dẫn tới</label>
                        <input type="text" class="form-control" name="link" id="name" placeholder="Nhập đường dẫn tới trang">
                    </div>
                    <div class="form-group">
                        <label for="name">Hiện thị</label>
                        <input type="text" class="form-control" name="hienthi" id="name" placeholder="Nhập hiện thị">
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" name="btnadd" class="btn btn-primary">Thêm danh mục</button>
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