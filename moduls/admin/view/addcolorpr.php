<div class="main-content">
                <h3 class="title-page">
                    Thêm chi tiết sản phẩm
                </h3>
               
                <form class="addPro" action="index.php?pg=addcolorpr " method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="categories">sản phẩm:</label>
                        <select class="form-select" name="idsp" aria-label="Default select example">
                            <option selected>Chọn danh mục</option>
                        <?php 
                        foreach($allsp as $item){
                            echo ' <option value="'.$item['id'].'">'.$item['productname'].'</option>';
                        }
                        
                        ?>
                           
                          </select>
                    </div>
                <div class="form-group">
                        <label for="name">Màu</label>
                        <input type="text" class="form-control" name="color" id="color" placeholder="Nhập màu">
                    </div>
                   
                    <div class="form-group">
                        <label for="exampleInputFile">Ảnh sản phẩm</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label>Mô tả chi tiết</label>
                        <textarea class="form-control" name="detail" rows="5"
                            placeholder="Nhập 1 đoạn mô tả ngắn về sản phẩm" style="height: 180px;"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="name">số lượng</label>
                        <input type="text" class="form-control" name="sl" id="color" placeholder="Nhập số lượng">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btnaddpr" class="btn btn-primary">Submit</button>
                    </div>
                   
                </form>
            </div>