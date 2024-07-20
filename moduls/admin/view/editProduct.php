<div class="main-content">
                <h3 class="title-page">
                    sửasản phẩm
                </h3>
                <p style="color: green;"><?php if(isset($tb)) echo $tb;?></p>
               
                <form class="addPro" action="index.php?pg=products_update1&idpr=<?=$kqone[0]['id'];?>&id=<?=$kqonecl[0]['id_prdetail']?> " method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Tên sản phẩm:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sả phẩm" value="<?=$kqone[0]['productname']?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Ảnh sản phẩm</label>
                        <div class="custom-file">
                        <img  src="/cuahangiphone/templates/image/<?=$kqone[0]['Image']?>" alt=""style=" width: 170px;" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="categories">Danh mục:</label>
                        <select class="form-select" name="iddm" aria-label="Default select example">
                            <option selected>Chọn danh mục</option>
                        <?php 
                        foreach($alldm as $item){
                            echo ' <option value="'.$item['id'].'">'.$item['name'].'</option>';
                        }
                        
                        ?>
                           
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Giá gốc:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="text" name="price" id="price" class="form-control" placeholder="Nhập giá gốc"value="<?=$kqone[0]['price']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price_sale">Giá khuyến mãi:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="text" name="price_sale" id="price_sale" class="form-control" value="<?=$kqone[0]['discount']?>"
                                placeholder="Giá khuyến mãi">
                        </div>
                    </div>
                   
                <div class="form-group">
                        <label for="name">Màu</label>
                        <input type="text" class="form-control" name="color" id="color" placeholder="Nhập tên sả phẩm"value="<?=$kqonecl[0]['color']?>">
                    </div>
                   
                    <div class="form-group">
                        <label for="exampleInputFile">Ảnh sản phẩm chi tiết</label>
                        <div class="custom-file">
                        <img  src="/cuahangiphone/templates/image/<?=$kqonecl[0]['image_detail']?>" alt=""style=" width: 170px;" >
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label>Mô tả chi tiết</label>
                        <textarea class="form-control" name="detail" rows="3"
                            placeholder="Nhập 1 đoạn mô tả ngắn về sản phẩm" style="height: 78px;"><?=$kqonecl[0]['description']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="name">số lượng</label>
                        <input type="text" class="form-control" name="sl" id="color" value="<?=$kqonecl[0]['soluong']?>" placeholder="Nhập tên sả phẩm">
                    </div>
                   
                    <div class="form-group">
                        <button type="submit" name="btnedit" class="btn btn-primary">Submit</button>
                    </div>
                    
                </form>
            </div>