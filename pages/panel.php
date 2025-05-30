<?php include '../php/baglan.php';?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Panel</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--Css-->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/panel.css">    
</head>
<body>
    <?php 
        $kategoriler = $db->query('select * from kategori order by id desc')->fetchAll(PDO::FETCH_ASSOC);
        $kullanicilar = $db->query('select * from kullanici order by id desc')->fetchAll(PDO::FETCH_ASSOC);        
        $yayinevleri = $db->query('select * from yayinevi order by id desc')->fetchAll(PDO::FETCH_ASSOC);
        $yazarlar = $db->query('select * from yazar order by id desc')->fetchAll(PDO::FETCH_ASSOC);
        
        $kitaplar = $db->query('SELECT kitap.*, yazar.isim as yazar_isim, 
        yayinevi.isim as yayinevi_isim, kategori.isim as kategori_isim FROM 
        (((kitap inner join yazar on kitap.yazar_id = yazar.id) 
        inner join yayinevi on kitap.yayinevi_id = yayinevi.id) 
        inner join kategori on kitap.kategori_id = kategori.id) order by kitap.id desc')->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="sidebar">
        <div class="baslik">
            <h3>PANEL</h3>
            <a href="#" onClick="cikisYap()" title="Çıkış Yap"><i class="fa-sharp fa-regular fa-circle-xmark fa-2xl"></i></a>
        </div>
        <ul>
            <li><a href="#kitap" onclick="takas(kitap)">Kitap</a></li>
            <li><a href="#yazar" onclick="takas(yazar)">Yazar</a></li>
            <li><a href="#yayinevi" onclick="takas(yayinevi)">Yayınevi</a></li>
            <li><a href="#kategori" onclick="takas(kategori)">Kategori</a></li>
            <li><a href="#kullanici" onclick="takas(kullanici)">Kullanıcı</a></li>
        </ul>
    </div>

    <div class="container">
        <div id="kitap"> <!-- kitap -->
            <h3>Kitap</h3>
            <button class="btn btn-primary btnekle"  data-toggle="modal" data-target="#kitapEkle">Ekle</button>
            <table class="table table-bordered table-success table-hover text-center"> 
                <tr>
                    <th>Id</th> <th>Isbn</th> <th>İsim</th> <th>Stok</th>
                    <th>Sayfa Sayısı</th> <th>Özet</th> <th>Yazar</th> <th>Yayınevi</th>
                        <th>Kategori</th> <th>Kapak</th> <th>Ücret</th> <th></th>
                </tr>            
                <?php foreach($kitaplar as $kitap) { ?>
                <tr>
                    <td><?= $kitap['id'] ?></td> 
                    <td onClick="popupAc(<?= $kitap['id'] ?>,'isbn','kitap')" height="50"><?= $kitap['isbn'] ?></td>
                    <td onClick="popupAc(<?= $kitap['id'] ?>,'isim','kitap')" height="50"><?= $kitap['isim'] ?></td>
                    <td onClick="popupAc(<?= $kitap['id'] ?>,'stok','kitap')" height="50"><?= $kitap['stok'] ?></td>
                    <td onClick="popupAc(<?= $kitap['id'] ?>,'sayfa_sayisi','kitap')" height="50"><?= $kitap['sayfa_sayisi'] ?></td>
                    <td onClick="popupAc(<?= $kitap['id'] ?>,'ozet','kitap')"><div class="paragraf"><?= $kitap['ozet'] ?></div></td>
                    <td onClick="selectpopupAc(<?= $kitap['id'] ?>,'yazar_id','kitap','yazar_select')" height="50"><?= $kitap['yazar_isim'] ?></td>
                    <td onClick="selectpopupAc(<?= $kitap['id'] ?>,'yayinevi_id','kitap','yayinevi_select')" height="50"><?= $kitap['yayinevi_isim'] ?></td>
                    <td onClick="selectpopupAc(<?= $kitap['id'] ?>,'kategori_id','kitap','kategori_select')" height="50"><?= $kitap['kategori_isim'] ?></td>
                    <td onClick="resimpopupAc(<?= $kitap['id'] ?>,'kapak','kitap')" height="50"><?= $kitap['kapak'] ?></td>
                    <td onClick="popupAc(<?= $kitap['id'] ?>,'ucret','kitap')" height="50"><?= $kitap['ucret'] ?> ₺</td> <!-- Ücret bilgisi eklendi -->

                    <td height="50">
                        <button onClick="silAlert(<?= $kitap['id'] ?>,'sil','kitap')" 
                                class="btn btn-danger">Sil</button>
                    </td>     
                </tr>
                <?php } ?>
            </table>

            <!-- kitap ekle -->
            <div class="modal fade" id="kitapEkle" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h3 class="text-center mb-4">Kitap Ekle</h3>
                            <form action="../php/islem.php" method="post"  enctype="multipart/form-data">
                                <input type="hidden" name="islem" value="kitap_ekle">
                                <div class="form-group">
                                    <label>Isbn: </label>
                                    <input name="isbn" type="text" class="form-control" placeholder="Isbn" required>
                                </div> 
                                <div class="form-group">
                                    <label>İsim: </label>
                                    <input name="isim" type="text" class="form-control" placeholder="İsim" required>
                                </div> 
                                <div class="form-group">
                                    <label>Stok: </label>
                                    <input name="stok" type="text" class="form-control" placeholder="Stok" required>
                                </div> 
                                <div class="form-group">
                                    <label>Sayfa Sayısı: </label>
                                    <input name="sayfa_sayisi" type="text" class="form-control" placeholder="Sayfa Sayısı" required>
                                </div> 
                                <div class="form-group">
                                    <label>Özet: </label>
                                    <textarea name="ozet" rows="4" class="form-control" placeholder="Özet" required></textarea>
                                </div> 
                                <div class="form-group">
                                    <label>Yazar: </label>
                                    <select class="form-select form-select-lg" name="yazar_id" id="yazar_select">
                                        <?php foreach($yazarlar as $yazar) {?>
                                            <option value="<?= $yazar['id'];?>"><?= $yazar['isim'];?></option>
                                        <?php }?>
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label>Yayınevi: </label>
                                    <select class="form-select form-select-lg" name="yayinevi_id" id="yayinevi_select">
                                        <?php foreach($yayinevleri as $yayinevi) {?>
                                            <option value="<?= $yayinevi['id'];?>"><?= $yayinevi['isim'];?></option>
                                        <?php }?>
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label>Kategori: </label>
                                    <select class="form-select form-select-lg" name="kategori_id" id="kategori_select">
                                        <?php foreach($kategoriler as $kategori) {?>
                                            <option value="<?= $kategori['id'];?>"><?= $kategori['isim'];?></option>
                                        <?php }?>
                                    </select>
                                </div> 
                                <!-- Ücret Ekleme -->
                                <div class="form-group">
                                    <label>Ücret: </label>
                                    <input name="ucret" type="text" class="form-control" placeholder="Kitap Ücreti" required>
                                </div>
                                <div class="form-group">
                                    <label>Kapak: </label>
                                    <input type="file" name="dosya">
                                </div> 
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Ekle</button>                    
                            <button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>
                        </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="yazar"> <!-- yazar -->
        <h3>Yazar</h3>
        <button class="btn btn-primary btnekle"  data-toggle="modal" data-target="#yazarEkle">Ekle</button>
        <table class="table table-bordered table-success table-hover text-center"> 
            <tr>
                <th>Id</th> <th>İsim</th> <th>Özgeçmiş</th> <th>Resim</th> <th></th>
            </tr>            
            <?php foreach($yazarlar as $yazar) { ?>
            <tr>
                <td><?= $yazar['id'] ?></td> 
                <td onClick="popupAc(<?= $yazar['id'] ?>,'isim','yazar')"><?= $yazar['isim'] ?></td>
                <td onClick="popupAc(<?= $yazar['id'] ?>,'ozgecmis','yazar')"><div class="paragraf"><?= $yazar['ozgecmis'] ?></div></td>
                <td onClick="resimpopupAc(<?= $yazar['id'] ?>,'resim','yazar')"><?= $yazar['resim'] ?></td>
                <td>
                    <button onClick="silAlert(<?= $yazar['id'] ?>,'sil','yazar')" 
                            class="btn btn-danger">Sil</button>
                </td>     
            </tr>
            <?php } ?>
        </table>

        <!-- yazar ekle -->
        <div class="modal fade" id="yazarEkle" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="text-center mb-4">Yazar Ekle</h3>
                        <form action="../php/islem.php" method="post"  enctype="multipart/form-data">
                            <input type="hidden" name="islem" value="yazar_ekle">
                            <div class="form-group">
                                <label>Yazar İsim: </label>
                                <input name="isim" type="text" class="form-control" placeholder="Yazar İsim" required>
                            </div> 
                            <div class="form-group">
                                <label>Özgemiş: </label>
                                <textarea name="ozgecmis" rows="4" class="form-control" placeholder="Özgemiş" required></textarea>
                            </div> 
                            <div class="form-group">
                                <label>Resim: </label>
                                <input type="file" name="dosya">
                            </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ekle</button>                    
                        <button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>
                    </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <div id="yayinevi"> <!-- yayınevi -->
        <h3>Yayınevi</h3>
        <button class="btn btn-primary btnekle"  data-toggle="modal" data-target="#yayineviEkle">Ekle</button>
        <table class="table table-bordered table-success table-hover text-center"> 
            <tr>
                <th>Id</th> <th>İsim</th> <th></th>
            </tr>            
            <?php foreach($yayinevleri as $yayinevi) { ?>
                <tr>
                    <td><?= $yayinevi['id'] ?></td> 
                    <td onClick="popupAc(<?= $yayinevi['id'] ?>,'isim','yayinevi')"><?= $yayinevi['isim'] ?></td>
                    <td>
                        <button onClick="silAlert(<?= $yayinevi['id'] ?>,'sil','yayinevi')" 
                                class="btn btn-danger">Sil</button>
                    </td>     
                </tr>
            <?php } ?>
        </table>

        <!-- yayınevi ekle -->
        <div class="modal fade" id="yayineviEkle" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="text-center mb-4">Yayınevi Ekle</h3>
                        <form action="../php/islem.php" method="get">
                            <input type="hidden" name="islem" value="yayinevi_ekle">
                            <input type="hidden" name="id" value="0">
                            <div class="form-group">
                                <label>Yayınevi Adı: </label>
                                <input name="isim" type="text" class="form-control" placeholder="Yayınevi Adı" required>
                            </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ekle</button>                    
                        <button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>
                    </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <div id="kategori"> <!-- kategori -->
        <h3>Kategori</h3>
        <button class="btn btn-primary btnekle"  data-toggle="modal" data-target="#kategoriEkle">Ekle</button>
        <table class="table table-bordered table-success table-hover text-center"> 
            <tr>
                <th>Id</th> <th>İsim</th> <th></th>
            </tr>            
            <?php foreach($kategoriler as $kategori) { ?>
            <tr>
                <td><?= $kategori['id'] ?></td> 
                <td onClick="popupAc(<?= $kategori['id'] ?>,'isim','kategori')"><?= $kategori['isim'] ?></td>
                <td>
                    <button onClick="silAlert(<?= $kategori['id'] ?>,'sil','kategori')" 
                            class="btn btn-danger">Sil</button>
                </td>     
            </tr>
            <?php } ?>
        </table>

        <!-- kategori ekle -->
        <div class="modal fade" id="kategoriEkle" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="text-center mb-4">Kategori Ekle</h3>
                        <form action="../php/islem.php" method="get">
                            <input type="hidden" name="islem" value="kategori_ekle">
                            <input type="hidden" name="id" value="0">
                            <div class="form-group">
                                <label>Kategori Adı: </label>
                                <input name="isim" type="text" class="form-control" placeholder="Kategori Adı" required>
                            </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ekle</button>                    
                        <button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>
                    </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <div id="kullanici"> <!-- kullanıcı -->
        <h3>Kullanıcı</h3>
        <button class="btn btn-primary btnekle"  data-toggle="modal" data-target="#kullaniciEkle">Ekle</button>
        <table class="table table-bordered table-success table-hover text-center"> 
            <tr>
                <th>Id</th> <th>Ad</th> <th>Soyad</th> <th>Email</th> <th>Ceza Tarihi</th> <th>Aktif Kira Sayısı</th> <th></th>
            </tr>            
            <?php foreach($kullanicilar as $kullanici) { ?>
            <tr>
                <td><?= $kullanici['id'] ?></td> 
                <td onClick="popupAc(<?= $kullanici['id'] ?>,'ad','kullanici')"><?= $kullanici['ad'] ?></td>
                <td onClick="popupAc(<?= $kullanici['id'] ?>,'soyad','kullanici')"><?= $kullanici['soyad'] ?></td>
                <td onClick="popupAc(<?= $kullanici['id'] ?>,'email','kullanici')"><?= $kullanici['email'] ?></td>
                <td onClick="popupAc(<?= $kullanici['id'] ?>,'ceza_tarihi','kullanici')"><?= $kullanici['ceza_tarihi'] ?></td>
                <td onClick="popupAc(<?= $kullanici['id'] ?>,'aktif_kira_sayisi','kullanici')"><?= $kullanici['aktif_kira_sayisi'] ?></td>
                <td>
                    <button onClick="silAlert(<?= $kullanici['id'] ?>,'sil','kullanici')" 
                            class="btn btn-danger">Sil</button>
                </td>     
            </tr>
            <?php } ?>
        </table>

        <!-- kullanıcı ekle -->
        <div class="modal fade" id="kullaniciEkle" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="text-center mb-4">Kullanıcı Ekle</h3>
                        <form action="../php/islem.php" method="get">
                            <input type="hidden" name="islem" value="kullanici_ekle">
                            <input type="hidden" name="id" value="0">
                            <div class="form-group">
                                <label>Kullanıcı Ad: </label>
                                <input name="ad" type="text" class="form-control" placeholder="Kullanıcı Ad" required>
                            </div> 
                            <div class="form-group">
                                <label>Kullanıcı Soyad: </label>
                                <input name="soyad" type="text" class="form-control" placeholder="Kullanıcı Soyad" required>
                            </div> 
                            <div class="form-group">
                                <label>Kullanıcı Email: </label>
                                <input name="email" type="email" class="form-control" placeholder="Kullanıcı Email" required>
                            </div> 
                            <div class="form-group">
                                <label>Şifre: </label>
                                <input name="sifre" type="password" class="form-control" placeholder="Şifre" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ekle</button>                    
                        <button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>
                    </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <!-- popup -->
    <div class="overlay">
        <div class="popup text-center">
            <h2>Güncelle</h2>
            <div class="input_bilgi mt-3 mb-3"> 
            </div>
            <button id="guncelle_btn" class="btn btn-success">Güncelle</button>
            <button onClick="popupKapat()" class="btn btn-danger">İptal</button>
        </div>
    </div>

    <!-- select popup -->
    <div class="select_overlay">
        <div class="popup text-center">
            <h2>Güncelle</h2>
            <div class="input_select mt-3 mb-3"> 
            </div>
            <button id="guncelle_btn2" class="btn btn-success">Güncelle</button>
            <button onClick="popupKapat('selectbar')" class="btn btn-danger">İptal</button>
        </div>
    </div>

    <!-- resim popup -->
    <div class="resim_overlay">
        <div class="popup text-center">
            <form action="../php/islem.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="islem" value="resim_guncelle">
                <h2>Güncelle</h2>
                <div class="input_resim mt-3 mb-3"> 
                </div>
                <button type="submit" class="btn btn-success">Güncelle</button>
                <button type="button" onClick="popupKapat('resim')" class="btn btn-danger">İptal</button>
            </form>
        </div>            
    </div>

    <!-- menü -->
    <script type="text/javascript">
        let kitap = document.querySelector("#kitap");    
        let kategori = document.querySelector("#kategori");
        let kullanici = document.querySelector("#kullanici");
        let yayinevi = document.querySelector("#yayinevi");
        let yazar = document.querySelector("#yazar");        
        
        let popup = document.querySelector(".overlay");      
        let select_popup = document.querySelector(".select_overlay");      
        let resim_popup = document.querySelector(".resim_overlay");      

        let container = document.querySelector(".container");
        
        function takas(eklenecek) { // menü
            eklenecek.style.visibility = "visible";
            eklenecek.style.position = "relative";
            container.replaceChild(eklenecek,container.lastElementChild);
        };

        window.onload = function() { // açılışta yönlendirme
            let hedef = String(window.location).split("#")[1];            
            if(hedef != undefined) {
                hedef = document.querySelector("#"+hedef);
                takas(hedef);
            }
        };

        function popupAc(id,sutun,tablo) {
            popup.style.visibility = "visible";
            popup.style.display = "block";
            var input;
            if(sutun!='ozet' && sutun!='ozgecmis')
                input = document.createElement("input");
            else {
                input = document.createElement("textarea");
                input.rows = 6;
            }
            input.id = "guncelle_input";
            input.className = "form-control";
            container.addEventListener("click",function fonk(e) { // inputa veri ekleme
                if( input.value == "")
                    input.value  = e.target.textContent});
            document.querySelector(".input_bilgi").appendChild(input);
            document.querySelector("#guncelle_btn").addEventListener("click",function fonk() { // güncelleme butonu
                var deger = document.querySelector("#guncelle_input").value;
                window.location.href = '../php/islem.php?islem=guncelle&tablo='+tablo+'&id='+id+'&sutun='+sutun+'&deger='+deger; 
            });            
        }

        function selectpopupAc(id,sutun,tablo,selectid) {
            select_popup.style.visibility = "visible";
            select_popup.style.display = "block";            

            var select = document.querySelector("#"+selectid).cloneNode(true); // klonlama                     
            
            select.classList.add('selector');
            document.querySelector(".input_select").appendChild(select);
            container.addEventListener("click",function fonk(e) { // kayıtlı olanı seçme
                while(select.options[select.selectedIndex].textContent != e.target.textContent)
                    select.selectedIndex++;
            });
            
            document.querySelector("#guncelle_btn2").addEventListener("click",function fonk() { // güncelleme butonu
                var deger = select.value;
                window.location.href = '../php/islem.php?islem=guncelle&tablo='+tablo+'&id='+id+'&sutun='+sutun+'&deger='+deger; 
            });            
        }

        function resimpopupAc(id,sutun,tablo) {
            resim_popup.style.visibility = "visible";
            resim_popup.style.display = "block";
            var input = document.createElement("input");
            input.id = "guncelle_input";

            var silinecek = document.createElement("input");
            silinecek.type = "hidden"; silinecek.name = "deger"; 

            var img = document.createElement("img");
            img.id = "popup_resim";
            container.addEventListener("click",function fonk(e) { // resim ekleme
                img.src  = e.target.textContent;
                silinecek.value = e.target.textContent;
            });
            document.querySelector(".input_resim").appendChild(silinecek);
            img.style.width = '400px'; 
            img.style.height = '400px'; 
            document.querySelector(".input_resim").appendChild(img);
            input.type = "file"; input.name = "dosya"; 
            input.classList.add("form-control");  input.classList.add("mt-2");
            document.querySelector(".input_resim").appendChild(input);
            var input1 = document.createElement("input");
            input1.type = "hidden"; input1.name = "id"; input1.value = id;
            document.querySelector(".input_resim").appendChild(input1);
            var input2 = document.createElement("input");
            input2.type = "hidden"; input2.name = "sutun"; input2.value = sutun;
            document.querySelector(".input_resim").appendChild(input2);
            var input3 = document.createElement("input");
            input3.type = "hidden"; input3.name = "tablo"; input3.value = tablo;
            document.querySelector(".input_resim").appendChild(input3);
        }

        function popupKapat(kontrol) {
            if( kontrol == 'resim') {
                document.querySelector("#guncelle_input").remove();
                
                document.querySelector("#popup_resim").remove();
                resim_popup.style.visibility = "hidden";
                resim_popup.style.display = "none";
            }
            else if( kontrol == 'selectbar') {                
                document.querySelector(".selector").remove();
                select_popup.style.visibility = "hidden";
                select_popup.style.display = "none";
            }
            else {
                document.querySelector("#guncelle_input").remove();
                popup.style.visibility = "hidden";
                popup.style.display = "none";
            }            
        };      
    </script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- silme alerti -->
    <script type="text/javascript">
        function silAlert(id,islem,tablo) {
            Swal.fire({
                title: 'Kayıt Silinsin Mi?',
                text: "Bu işlem geri alınamaz!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet',
                cancelButtonText: 'Hayır'
                }).then((result) => {
                    if (result.isConfirmed) {              
                        //window.open('../php/islem.php?islem='+islem+'&id='+id); // , "_blank"
                        window.location.href = '../php/islem.php?islem='+islem+'&id='+id+'&tablo='+tablo ; // , "_blank"
                    }
            })
        }

        function cikisYap() {
            Swal.fire({
                title: 'Çıkış Başarılı',
                icon: 'success',
                showCancelButton: false,
                showConfirmButton: false
            });            
            setTimeout(function() {
                window.location.href = '../loginadmin.php'; 
            }, 1500);
        }
    </script>
</body>
</html>