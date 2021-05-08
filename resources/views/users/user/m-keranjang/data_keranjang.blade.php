	
<script type="text/javascript">
    var sub_keranjang_current = {}; 
    var sub_keranjang = {};
    var sub_total = [];
    var sub_total_current = [];
            // var keynota_current = [];
        </script>
        <div class="kategori-tabs" style="font-size: 0.85em; ">
            <div onclick="pindah_halaman('keranjang')" style="background: #EAF4FF;">
                <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.9998 3.1665C21.5194 3.1665 23.9358 4.16739 25.7174 5.94899C27.499 7.73059 28.4998 10.1469 28.4998 12.6665V14.2498H34.8332V17.4165H32.9854L31.7868 31.7979C31.7539 32.1936 31.5735 32.5624 31.2814 32.8313C30.9893 33.1003 30.6069 33.2496 30.2098 33.2498H7.78984C7.39281 33.2496 7.01036 33.1003 6.71827 32.8313C6.42619 32.5624 6.24579 32.1936 6.21284 31.7979L5.01267 17.4165H3.1665V14.2498H9.49984V12.6665C9.49984 10.1469 10.5007 7.73059 12.2823 5.94899C14.0639 4.16739 16.4803 3.1665 18.9998 3.1665ZM29.8077 17.4165H8.19042L9.2465 30.0832H28.7516L29.8077 17.4165ZM20.5832 20.5832V26.9165H17.4165V20.5832H20.5832ZM14.2498 20.5832V26.9165H11.0832V20.5832H14.2498ZM26.9165 20.5832V26.9165H23.7498V20.5832H26.9165ZM18.9998 6.33317C17.375 6.33317 15.8122 6.95769 14.6349 8.07757C13.4575 9.19744 12.7557 10.727 12.6744 12.3498L12.6665 12.6665V14.2498H25.3332V12.6665C25.3332 11.0416 24.7087 9.47889 23.5888 8.30155C22.4689 7.12421 20.9394 6.42233 19.3165 6.34109L18.9998 6.33317Z" fill="{{$page->warna_header}}"/>
                    </svg>

                    <div>Keranjang</div>
                </div>
                <div onclick="pindah_halaman('terkonfirmasi')">
                    <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.1947 28.4998C14.0065 29.8208 13.348 31.0295 12.3402 31.9039C11.3323 32.7783 10.0428 33.2598 8.7085 33.2598C7.37419 33.2598 6.08469 32.7783 5.07684 31.9039C4.06899 31.0295 3.41047 29.8208 3.22225 28.4998H1.5835V9.49984C1.5835 9.07991 1.75031 8.67718 2.04724 8.38025C2.34418 8.08332 2.7469 7.9165 3.16683 7.9165H25.3335C25.7534 7.9165 26.1561 8.08332 26.4531 8.38025C26.75 8.67718 26.9168 9.07991 26.9168 9.49984V12.6665H31.6668L36.4168 19.0885V28.4998H33.1947C33.0065 29.8208 32.348 31.0295 31.3402 31.9039C30.3323 32.7783 29.0428 33.2598 27.7085 33.2598C26.3742 33.2598 25.0847 32.7783 24.0768 31.9039C23.069 31.0295 22.4105 29.8208 22.2222 28.4998H14.1947ZM23.7502 11.0832H4.75016V23.829C5.37489 23.1912 6.14445 22.7138 6.99335 22.4374C7.84226 22.161 8.74538 22.0938 9.62584 22.2415C10.5063 22.3892 11.3381 22.7475 12.0503 23.2858C12.7625 23.8241 13.3342 24.5264 13.7166 25.3332H22.7004C22.9664 24.7743 23.3227 24.266 23.7502 23.829V11.0832ZM26.9168 20.5832H33.2502V20.1319L30.0708 15.8332H26.9168V20.5832ZM27.7085 30.0832C28.3386 30.0832 28.9429 29.8329 29.3884 29.3873C29.834 28.9418 30.0843 28.3375 30.0843 27.7074C30.0843 27.0773 29.834 26.473 29.3884 26.0274C28.9429 25.5819 28.3386 25.3316 27.7085 25.3316C27.0784 25.3316 26.4741 25.5819 26.0286 26.0274C25.583 26.473 25.3327 27.0773 25.3327 27.7074C25.3327 28.3375 25.583 28.9418 26.0286 29.3873C26.4741 29.8329 27.0784 30.0832 27.7085 30.0832ZM11.0835 27.7082C11.0835 27.3963 11.0221 27.0874 10.9027 26.7993C10.7834 26.5111 10.6084 26.2493 10.3879 26.0288C10.1673 25.8083 9.90552 25.6333 9.61737 25.514C9.32922 25.3946 9.02039 25.3332 8.7085 25.3332C8.39661 25.3332 8.08777 25.3946 7.79962 25.514C7.51147 25.6333 7.24966 25.8083 7.02912 26.0288C6.80858 26.2493 6.63364 26.5111 6.51428 26.7993C6.39493 27.0874 6.3335 27.3963 6.3335 27.7082C6.3335 28.3381 6.58372 28.9422 7.02912 29.3875C7.47452 29.8329 8.07861 30.0832 8.7085 30.0832C9.33839 30.0832 9.94248 29.8329 10.3879 29.3875C10.8333 28.9422 11.0835 28.3381 11.0835 27.7082Z" fill="{{$page->warna_header}}"/>
                        </svg>

                        <div>Dalam Proses</div>
                    </div>
                    <div onclick="pindah_halaman('riwayat')">
                        <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M33.2498 7.91667C33.6698 7.91667 34.0725 8.08348 34.3694 8.38041C34.6664 8.67735 34.8332 9.08007 34.8332 9.5V31.6667C34.8332 32.0866 34.6664 32.4893 34.3694 32.7863C34.0725 33.0832 33.6698 33.25 33.2498 33.25H4.74984C4.32991 33.25 3.92718 33.0832 3.63025 32.7863C3.33332 32.4893 3.1665 32.0866 3.1665 31.6667V6.33333C3.1665 5.91341 3.33332 5.51068 3.63025 5.21375C3.92718 4.91681 4.32991 4.75 4.74984 4.75H16.4887L19.6553 7.91667H25.3332V11.0833H28.4998V7.91667H33.2498ZM28.4998 20.5833H25.3332V23.75H22.1665V28.5H28.4998V20.5833ZM25.3332 17.4167H22.1665V20.5833H25.3332V17.4167ZM28.4998 14.25H25.3332V17.4167H28.4998V14.25ZM25.3332 11.0833H22.1665V14.25H25.3332V11.0833Z" fill="{{$page->warna_header}}"/>
                            </svg>
                            <div>Riwayat</div>
                        </div>
                    </div>
                    @for ($i = 0; $i < count($daftar_tunggu_konfirmasi); $i++)
                    <div class="toko" style="background: white; width: 100%; padding: 0% 5%; margin-bottom: 0.5em; padding-top: 1em;">
                        <a class="nama-toko" href="<?=url('/')?>/<?=$daftar_tunggu_konfirmasi[$i]['username']?>" style="margin: 1em 0em; font-size: 1.15em;font-weight: 600; color: {{$page->warna_header}}">
                        {{$daftar_tunggu_konfirmasi[$i]['nama_toko']}}</a>
                        <span class="" style="width: 90%; background:{{$page->warna_header}}; border-radius: 2.5em; padding: 0.5em 1.5em; color: white; text-align: center; margin-bottom: 1em; position: relative; font-size: 0.8em;">
                            Menunggu Pesananan
                        </span>

                        <script type="text/javascript">
                            sub_total_current["<?=$daftar_tunggu_konfirmasi[$i]['id_toko']?>"] = 0;
                            sub_keranjang_current["<?=$daftar_tunggu_konfirmasi[$i]['id_toko']?>"] = "";
                        </script>

                        <div class="daftar-product" style="margin-top: 1em;">
                            @foreach ($daftar_tunggu_konfirmasi[$i]['product'] as $row)
                            <div class="product" style="display: flex; justify-content: space-between; margin-bottom: 1em;">
                                <div class="" style="width: 5%;">

                                </div>
                                <div class="deskripsi-product" style="width: 47%;"> 
                                    <div class="nama" id="nama_{{$row->id}}" style="font-size: 1em; color: {{$page->warna_header}}; font-weight: 500;"><?=ucwords(strtolower(substr(strip_tags($row->product->nama), 0, 35)))?>@if (strlen($row->product->nama) > 35)..@endif</div>

                                    @php $hasil_diskon_string = ""; @endphp
                                    @if ($row->product->jenis_harga == 'Statis')
                                    @if($row->product->diskon != '0')
                                    <div style="padding: 0; color: {{$page->warna_header}}; margin: 0.5em 0px 0px 0px; font-size: 0.9em; line-height: 1em; vertical-align: center; margin-bottom: 0em;">
                                        <s>IDR. {{number_format($row->product->harga)}}</s>
                                    </div>
                                    @php
                                    $hasil_diskon = ($row->product->harga)-((($row->product->diskon)/100)*($row->product->harga));
                                    @endphp
                                    <div style="color: {{$page->warna_header}}; padding: 0; margin: 0.1em 0px 0px 0em; font-size: 1.1em; line-height: 1em; font-weight: 500;">IDR. {{number_format($hasil_diskon)}}</div>
                                    @php $hasil_diskon_string = number_format($hasil_diskon); @endphp
                                    @else
                                    <div class="harga" style="color: {{$page->warna_header}};">IDR. {{number_format($row->product->harga,0,',','.')}}</div>
                                    @endif	

                                    @else
                                    <div style="padding: 0; color: {{$page->warna_header}}; margin: 0.5em 0px 0px 0px; font-size: 0.9em; line-height: 1em; vertical-align: center; margin-bottom: 0em;">
                                        Harga Mulai
                                    </div>
                                    <div style="padding: 0;color: {{$page->warna_header}}; margin: 0.1em 0px 0px 0em; font-size: 1.3em; line-height: 1em; font-weight: 500;">IDR. {{number_format($row->toko->harga_terendah)}}</div>

                                    @endif
                                    <div class="button-detail" style="margin-top: 1em; display: flex;">
                                        <div id="kurang_{{$row->id}}" style="width: 2em; height: 2em; background: white; border-radius: 50%; background: {{$page->warna_header}}; color: {{$page->warna_body}};text-align: center; font-size: 0.7em; padding-top: 0.3em; margin-right: 0.2em;" ><i class="fa fa-minus"></i></div>
                                        <div style="width: 3em; height: 2em; background: white; border-radius: 2em; background: {{$page->warna_header}}; color: {{$page->warna_body}}; display: flex; justify-content: center; align-items: center; margin-right: 0.2em; font-size: 0.7em; font-weight: 700;" id="jumlah_pesanan_<?=$row->id?>">{{$row->jumlah}}</div>
                                        <div id="tambah_{{$row->id}}" style="width: 2.1em; height: 2em; background: white; border-radius: 50%; background:  {{$page->warna_header}};color: {{$page->warna_body}};text-align: center; font-size: 0.7em; padding-top: 0.3em;" ><i class="fa fa-plus"></i></div>
                                    </div>									
                                </div>
                                <a  href="<?=url('/')?>/{{$daftar_tunggu_konfirmasi[$i]['username']}}/daftar-menu/{{$row->product_id}}" class="foto-product" style="width: 30%;">
                                    <img id="gambar_{{$row->id}}" src="<?=url('/')?>/public/img/toko/{{$daftar_tunggu_konfirmasi[$i]['id_toko']}}/produk/240x240/{{$row->product->foto_produk}}" style="width: 100%; border-radius: 1em;">
                                </a>
                                <div class="" style="display: flex; justify-content: center; align-items: center; width: 8%;" onclick="hapus_keranjang('<?=$row->id?>')">

                                </div>
                            </div>
                            <script type="text/javascript">
                                @if ($row->product->jenis_harga == 'Statis')
                                @if($row->product->diskon != '0')
                                @php
                                $hasil_diskon = ($row->product->harga)-((($row->product->diskon)/100)*($row->product->harga));
                                $hasil_diskon_string = number_format($hasil_diskon);				
                                @endphp
                                sub_total_current["<?=$daftar_tunggu_konfirmasi[$i]['id_toko']?>"] += <?=$hasil_diskon?>*<?=$row->jumlah?>;
                                @else
                                sub_total_current["<?=$daftar_tunggu_konfirmasi[$i]['id_toko']?>"] += <?=$row->product->harga?>*<?=$row->jumlah?>;
                                @endif	
                                @endif


                                sub_keranjang_current["<?=$daftar_tunggu_konfirmasi[$i]['id_toko']?>"] += "<?=$row->id?>"+"~";
                    // id_product_current[] = 
                </script>					
                @endforeach
            </div>
        </div>
        <div style="width: 100%; display: flex; justify-content: center;" onclick="batalkan_pesanan('{{$daftar_tunggu_konfirmasi[$i]['keynota']}}')">
            <div class="" style="width: 90%; background: #969696; border-radius: 35px; padding: 0.5em; color: white; text-align: center; margin-bottom: 1em; position: relative;">
                <img style="width: 1.2em; position: absolute; left: 3.8em;top: 0.6em;"><span>Batalkan Pesanan</span>
            </div>
        </div>
        <script type="text/javascript">

        </script>

        @endfor

        @for ($i = 0; $i < count($data_keranjang_current); $i++)
        <div class="toko" style="background: white; width: 100%; padding: 0% 5%; margin-bottom: 0.5em; padding-top: 1em;">
            <a class="nama-toko" href="<?=url('/')?>/<?=$data_keranjang_current[$i]['username']?>" style="margin: 1em 0em; font-size: 1.15em;font-weight: 600; color: {{$page->warna_header}}">
            {{$data_keranjang_current[$i]['nama_toko']}}</a>
            <script type="text/javascript">
                sub_total_current["<?=$data_keranjang_current[$i]['id_toko']?>"] = 0;
                sub_keranjang_current["<?=$data_keranjang_current[$i]['id_toko']?>"] = "";
            </script>

            <div class="daftar-product" style="margin-top: 1em;">
                @foreach ($data_keranjang_current[$i]['product'] as $row)
                <div class="product" style="display: flex; justify-content: space-between; margin-bottom: 1em;">
                    <div class="" style="width: 5%;">
                        <input type="checkbox" name="" checked id="checkbox_{{$row->id}}" onclick='checkbox_check_current("<?=$row->id?>", "<?=$row->harga?>", "<?=$data_keranjang_current[$i]['id_toko']?>")'>
                    </div>
                    <div class="deskripsi-product" style="width: 47%;"> 
                        <div class="nama" id="nama_{{$row->id}}" style="font-size: 1em; color: {{$page->warna_header}}; font-weight: 500;">
                            <?=ucwords(strtolower(substr(strip_tags($row->nama), 0, 35)))?>
                            <?php 
                            if (strlen($row->nama) > 35){
                                echo "..";
                            }
                            else {
                                $panjang_sisa = 35-strlen($row->nama);
                                    // for ($i = 0; $i < $panjang_sisa; $i++){
                                echo $panjang_sisa;
                            }
                            ?>
                        </div>

                        @php $hasil_diskon_string = ""; @endphp
                        @if ($row->jenis_harga == 'Statis')
                        @if($row->diskon != '0')
                        <div style="padding: 0; color: {{$page->warna_header}}; margin: 0.5em 0px 0px 0px; font-size: 0.9em; line-height: 1em; vertical-align: center; margin-bottom: 0em;">
                            <s>IDR. {{number_format($row->harga)}}</s>
                        </div>
                        @php
                        $hasil_diskon = ($row->harga)-((($row->diskon)/100)*($row->harga));
                        @endphp
                        <div style="color: {{$page->warna_header}}; padding: 0; margin: 0.1em 0px 0px 0em; font-size: 1.1em; line-height: 1em; font-weight: 500;">IDR. {{number_format($hasil_diskon)}}</div>
                        @php $hasil_diskon_string = number_format($hasil_diskon); @endphp
                        @else
                        <div class="harga" style="color: {{$page->warna_header}};">IDR. {{number_format($row->harga,0,',','.')}}</div>
                        @endif	

                        @else
                        <div style="padding: 0; color: {{$page->warna_header}}; margin: 0.5em 0px 0px 0px; font-size: 0.9em; line-height: 1em; vertical-align: center; margin-bottom: 0em;">
                            Harga Mulai
                        </div>
                        <div style="padding: 0;color: {{$page->warna_header}}; margin: 0.1em 0px 0px 0em; font-size: 1.3em; line-height: 1em; font-weight: 500;">IDR. {{number_format($row->harga_terendah)}}</div>

                        @endif
                        <div class="button-detail" style="margin-top: 1em; display: flex;">
                            <div id="kurang_{{$row->id}}" style="width: 2em; height: 2em; background: white; border-radius: 50%; background: {{$page->warna_header}}; color: {{$page->warna_body}};text-align: center; font-size: 0.7em; padding-top: 0.3em; margin-right: 0.2em;" onclick='ubah_pesanan_current("<?=$row->id?>", "kurang", "<?=$row->harga?>", "<?=$data_keranjang_current[$i]['id_toko']?>")'><i class="fa fa-minus"></i></div>
                            <div style="width: 3em; height: 2em; background: white; border-radius: 2em; background: {{$page->warna_header}}; color: {{$page->warna_body}}; display: flex; justify-content: center; align-items: center; margin-right: 0.2em; font-size: 0.7em; font-weight: 700;" id="jumlah_pesanan_<?=$row->id?>">{{$row->jumlah}}</div>
                            <div id="tambah_{{$row->id}}" style="width: 2.1em; height: 2em; background: white; border-radius: 50%; background:  {{$page->warna_header}};color: {{$page->warna_body}};text-align: center; font-size: 0.7em; padding-top: 0.3em;" onclick='ubah_pesanan_current("<?=$row->id?>", "tambah", "<?=$row->harga?>", "<?=$data_keranjang_current[$i]['id_toko']?>")'><i class="fa fa-plus"></i></div>
                        </div>									
                    </div>
                    <a  href="<?=url('/')?>/{{$data_keranjang_current[$i]['username']}}/daftar-menu/{{$row->product_id}}" class="foto-product" style="width: 30%;">
                        <img id="gambar_{{$row->id}}" src="<?=url('/')?>/public/img/toko/{{$data_keranjang_current[$i]['id_toko']}}/produk/240x240/{{$row->foto_produk}}" style="width: 100%; border-radius: 1em;">
                    </a>
                    <div class="" style="display: flex; justify-content: center; align-items: center; width: 8%;" onclick="hapus_keranjang('<?=$row->id?>')">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 4H20V6H18V19C18 19.2652 17.8946 19.5196 17.7071 19.7071C17.5196 19.8946 17.2652 20 17 20H3C2.73478 20 2.48043 19.8946 2.29289 19.7071C2.10536 19.5196 2 19.2652 2 19V6H0V4H5V1C5 0.734784 5.10536 0.48043 5.29289 0.292893C5.48043 0.105357 5.73478 0 6 0H14C14.2652 0 14.5196 0.105357 14.7071 0.292893C14.8946 0.48043 15 0.734784 15 1V4ZM16 6H4V18H16V6ZM7 9H9V15H7V9ZM11 9H13V15H11V9ZM7 2V4H13V2H7Z" fill="{{$page->warna_header}}"/>
                            </svg>							
                        </div>
                    </div>
                    <script type="text/javascript">
                        @if ($row->jenis_harga == 'Statis')
                        @if($row->diskon != '0')
                        @php
                        $hasil_diskon = ($row->harga)-((($row->diskon)/100)*($row->harga));
                        $hasil_diskon_string = number_format($hasil_diskon);				
                        @endphp
                        sub_total_current["<?=$data_keranjang_current[$i]['id_toko']?>"] += <?=$hasil_diskon?>*<?=$row->jumlah?>;
                        @else
                        sub_total_current["<?=$data_keranjang_current[$i]['id_toko']?>"] += <?=$row->harga?>*<?=$row->jumlah?>;
                        @endif	
                        @endif


                        sub_keranjang_current["<?=$data_keranjang_current[$i]['id_toko']?>"] += "<?=$row->id?>"+"~";
                    // id_product_current[] = 
                </script>					
                @endforeach
            </div>
        </div>
        @if ($data_keranjang_current[$i]['product']->count() > 0)

        <div style="width: 100%; display: flex; justify-content: center;">
            <div class="" onclick='WhatsappMessage("<?=$data_keranjang_current[$i]['no_hp']?>", "<?=$data_keranjang_current[$i]['nama_toko']?>", "<?=$data_keranjang_current[$i]['id_toko']?>", "yes")' style="width: 90%; background: linear-gradient(41.88deg, #4AAE20 35.3%, #5EE825 88.34%); border-radius: 35px; padding: 0.5em; color: white; text-align: center; margin-bottom: 1em; position: relative;">
                <img  src="<?=url('/')?>/public/img/icon_svg/whatsapp.svg" style="width: 1.2em; position: absolute; left: 3.8em;top: 0.6em;"><span id="sub_total_current_<?=$data_keranjang_current[$i]['id_toko']?>">Rp. 1.500.000</span>
            </div>
        </div>
        @endif
        <script type="text/javascript">
            document.getElementById("sub_total_current_<?=$data_keranjang_current[$i]['id_toko']?>").innerHTML = formatToCurrency( sub_total_current["<?=$data_keranjang_current[$i]['id_toko']?>"]);
        </script>
        @endfor

        @for ($i = 0; $i < count($data_keranjang); $i++)
        <div class="toko" style="background: white; width: 100%; padding: 0% 5%; margin-bottom: 0.5em; padding-top: 1em;">
            <a class="nama-toko" href="<?=url('/')?>/<?=$data_keranjang[$i]['username']?>" style="margin: 1em 0em; font-size: 1.15em;font-weight: 600; color: {{$page->warna_header}}">{{$data_keranjang[$i]['nama_toko']}}</a>
            <script type="text/javascript">
                sub_total["<?=$data_keranjang[$i]['id_toko']?>"] = 0;
                sub_keranjang["<?=$data_keranjang[$i]['id_toko']?>"] = "";

            </script>
            <div class="daftar-product" style="margin-top: 1em;">
                @foreach ($data_keranjang[$i]['product'] as $row)
                <div class="product" style="display: flex; justify-content: space-between; margin-bottom: 1em;">
                    <div class="" style="width: 5%;">
                        <input type="checkbox" name="" checked id="checkbox_{{$row->id}}" onclick='checkbox_check("<?=$row->id?>", "<?=$row->harga?>", "<?=$data_keranjang[$i]['id_toko']?>")'>
                    </div>
                    <div class="deskripsi-product" style="width: 47%;"> 
                        <div class="nama" id="nama_{{$row->id}}" style="font-size: 1em; color: {{$page->warna_header}}; font-weight: 500;">
                            <?=ucwords(strtolower(substr(strip_tags($row->nama), 0, 35)))?>
                            <?php 
                            if (strlen($row->nama) > 35){
                                echo "..";
                            }
                            else {
                                $panjang_sisa = 35-strlen($row->nama);
                                    // for ($i = 0; $i < $panjang_sisa; $i++){
                                echo $panjang_sisa;
                                    // }
                            }
                            ?>
                        </div>
                        @php $hasil_diskon_string = ""; @endphp
                        @if ($row->jenis_harga == 'Statis')
                        @if($row->diskon != '0')
                        <div style="padding: 0; color: {{$page->warna_header}}; margin: 0.5em 0px 0px 0px; font-size: 0.9em; line-height: 1em; vertical-align: center; margin-bottom: 0em;">
                            <s>IDR. {{number_format($row->harga)}}</s>
                        </div>
                        @php
                        $hasil_diskon = ($row->harga)-((($row->diskon)/100)*($row->harga));
                        @endphp
                        <div style="color: {{$page->warna_header}}; padding: 0; margin: 0.1em 0px 0px 0em; font-size: 1.1em; line-height: 1em; font-weight: 500;">IDR. {{number_format($hasil_diskon)}}</div>
                        @php $hasil_diskon_string = number_format($hasil_diskon); @endphp
                        @else
                        <div class="harga" style="color: {{$page->warna_header}};">IDR. {{number_format($row->harga,0,',','.')}}</div>
                        @endif	

                        @else
                        <div style="padding: 0; color: {{$page->warna_header}}; margin: 0.5em 0px 0px 0px; font-size: 0.9em; line-height: 1em; vertical-align: center; margin-bottom: 0em;">
                            Harga Mulai
                        </div>
                        <div style="padding: 0;color: {{$page->warna_header}}; margin: 0.1em 0px 0px 0em; font-size: 1.3em; line-height: 1em; font-weight: 500;">IDR. {{number_format($row->harga_terendah)}}</div>

                        @endif
                        <div class="button-detail" style="margin-top: 1em; display: flex;">
                            <div id="kurang_{{$row->id}}" style="width: 2em; height: 2em; background: white; border-radius: 50%; background: {{$page->warna_header}}; color: {{$page->warna_body}};text-align: center; font-size: 0.7em; padding-top: 0.3em; margin-right: 0.2em;" onclick='ubah_pesanan("<?=$row->id?>", "kurang", "<?=$row->harga?>", "<?=$data_keranjang[$i]['id_toko']?>")'><i class="fa fa-minus"></i></div>
                            <div style="width: 3em; height: 2em; background: white; border-radius: 2em; background: {{$page->warna_header}}; color: {{$page->warna_body}}; display: flex; justify-content: center; align-items: center; margin-right: 0.2em; font-size: 0.7em; font-weight: 700;" id="jumlah_pesanan_<?=$row->id?>">{{$row->jumlah}}</div>
                            <div id="tambah_{{$row->id}}" style="width: 2.1em; height: 2em; background: white; border-radius: 50%; background:  {{$page->warna_header}};color: {{$page->warna_body}};text-align: center; font-size: 0.7em; padding-top: 0.3em;" onclick='ubah_pesanan("<?=$row->id?>", "tambah", "<?=$row->harga?>", "<?=$data_keranjang[$i]['id_toko']?>")'><i class="fa fa-plus"></i></div>
                        </div>									
                    </div>
                    <a  href="<?=url('/')?>/{{$data_keranjang[$i]['username']}}/daftar-menu/{{$row->product_id}}" class="foto-product" style="width: 30%;">
                        <img  id="gambar_{{$row->id}}" src="<?=url('/')?>/public/img/toko/{{$data_keranjang[$i]['id_toko']}}/produk/240x240/{{$row->foto_produk}}" style="width: 100%; border-radius: 1em;">
                    </a>
                    <div class="" style="display: flex; justify-content: center; align-items: center; width: 8%;" onclick="hapus_keranjang('<?=$row->id?>')">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 4H20V6H18V19C18 19.2652 17.8946 19.5196 17.7071 19.7071C17.5196 19.8946 17.2652 20 17 20H3C2.73478 20 2.48043 19.8946 2.29289 19.7071C2.10536 19.5196 2 19.2652 2 19V6H0V4H5V1C5 0.734784 5.10536 0.48043 5.29289 0.292893C5.48043 0.105357 5.73478 0 6 0H14C14.2652 0 14.5196 0.105357 14.7071 0.292893C14.8946 0.48043 15 0.734784 15 1V4ZM16 6H4V18H16V6ZM7 9H9V15H7V9ZM11 9H13V15H11V9ZM7 2V4H13V2H7Z" fill="{{$page->warna_header}}"/>
                            </svg>							
                        </div>
                    </div>
                    <script type="text/javascript">
                        @if ($row->jenis_harga == 'Statis')
                        @if($row->diskon != '0')
                        @php
                        $hasil_diskon = ($row->harga)-((($row->diskon)/100)*($row->harga));
                        $hasil_diskon_string = number_format($hasil_diskon);				
                        @endphp
                        sub_total["<?=$data_keranjang[$i]['id_toko']?>"] += <?=$hasil_diskon?>*<?=$row->jumlah?>;
                        @else
                        sub_total["<?=$data_keranjang[$i]['id_toko']?>"] += <?=$row->harga?>*<?=$row->jumlah?>;
                        @endif	
                        @endif
                        sub_keranjang["<?=$data_keranjang[$i]['id_toko']?>"] += "<?=$row->id?>"+"~";
                    </script>
                    @endforeach
                </div>
            </div>
            <div style="width: 100%; display: flex; justify-content: center;">

                <div class="" onclick='WhatsappMessage("<?=$data_keranjang[$i]['no_hp']?>", "<?=$data_keranjang[$i]['nama_toko']?>", "<?=$data_keranjang[$i]['id_toko']?>", "no")' style="width: 90%; background: linear-gradient(41.88deg, #4AAE20 35.3%, #5EE825 88.34%); border-radius: 35px; padding: 0.5em; color: white; text-align: center; margin-bottom: 1em; position: relative;">
                    <img onclick="modal_pesan()" src="<?=url('/')?>/public/img/icon_svg/whatsapp.svg" style="width: 1.2em; position: absolute; left: 3.8em;top: 0.6em;"><span id="sub_total_<?=$data_keranjang[$i]['id_toko']?>">Rp. 1.500.000</span>
                </div>
            </div>
            <script type="text/javascript">
                document.getElementById("sub_total_<?=$data_keranjang[$i]['id_toko']?>").innerHTML = formatToCurrency(sub_total["<?=$data_keranjang[$i]['id_toko']?>"]);
            </script>

            @endfor
