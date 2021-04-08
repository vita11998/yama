<?php $this->layout('template') ?>
<link rel="stylesheet" href="assets/css/step.css?v<?=rand(0,99)?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.0/css/pikaday.min.css"
    integrity="sha512-yFCbJ3qagxwPUSHYXjtyRbuo5Fhehd+MCLMALPAUar02PsqX3LVI5RlwXygrBTyIqizspUEMtp0XWEUwb/huUQ=="
    crossorigin="anonymous" />
<section class="container martop">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mb-3">CUSTOM TOUR JOGJA MURAH</h1>
            <?=$prakata['deskripsi']?>
            <img src="images/<?=$prakata['gambar']?>" class="w-100">
        </div>
    </div>
</section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center  mt-3 mb-2">
            <div class="card" style="background-color: #CEC2AB;">
                <div class="card-body ">
                    <h3 id="heading"> <i class="fa fa-map-marker"></i> Custom Tour Jogja</h3>
                    <form id="msform">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100" style="width:34%">Page 1 of 3</div>
                        </div> <br> <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card" style="background-color: #CEC2AB;">
                                <label class="fieldlabels " for="userName-2">Berapa Hari Anda Liburan ke Jogja ?
                                    *</label>
                                <select style="margin-bottom: 15px;" name="hari_liburan" class="required form-control"
                                    id="hari_liburan">
                                    <option value="1 Hari">1 Hari</option>
                                    <option value="2 Hari 1 Malam">2 Hari 1 Malam</option>
                                    <option value="3 Hari 2 Malam">3 Hari 2 Malam</option>
                                    <option value="4 Hari 3 Malam">4 Hari 3 Malam</option>
                                    <option value="5 Hari 4 Malam">5 Hari 4 Malam</option>
                                    <option value="Honeymoon">Honeymoon</option>
                                </select>
                                <label class="fieldlabels " >Berapa Orang Yang Akan Ikut Liburan ?
                                    *</label>
                                <input id="jml_orang" name="jml_orang" type="number"
                                    class="required ms-input form-control ">
                                <label class="fieldlabels" for="confirm-2">Kapan Rencana Akan Berlibur ? *</label>
                                <input id="confirm-2" name="confirm" type="text"
                                    class="required ms-input form-control datepicker ">
                                <label class="fieldlabels" for="password-2">Pilihan Armada *</label>
                                <select name="armada" id="armada" class="form-control">
                                    <option value="Avanza (2pax-6pax)" selected="selected">Avanza (2pax-6pax)</option>
                                    <option value="Luxio (2pax-6pax)">Luxio (2pax-6pax)</option>
                                    <option value="Innova (2pax-7pax)">Innova (2pax-7pax)</option>
                                    <option value="ELF Short (8pax-11pax)">ELF Short (8pax-11pax)</option>
                                    <option value="Toyota Hiace (12pax-15pax)">Toyota Hiace (12pax-15pax)</option>
                                    <option value="ELF Long (12pax-16pax)">ELF Long (12pax-16pax)</option>
                                    <option value="Micro Bus (16pax-33pax)">Micro Bus (16pax-33pax)</option>
                                    <option value="Big Bus (31pax-52pax)">Big Bus (31pax-52pax)</option>
                                </select>
                            </div> <input type="button" name="next" class="next action-button ms-input" value="Next" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h4 class="">Pilihan Tempat Wisata Jogja:</h4>
                                    </div>
                                    <?php foreach($lokasi as $l) : ?>
                                    <?php
                                        $tempat = $db->connection("SELECT * FROM tempat_wisata WHERE id_lokasi = $l[id_lokasi]")->fetchAll();
                                    ?>
                                    <div class="col-6">
                                        <p class="font-weight-bold mt-3">Objek Wisata <?= $l['judul']?> </p>
                                        <?php foreach($tempat as $t) : ?>
                                        <input type="checkbox" class="" id="<?=$t['judul_seo']?>"
                                            value="<?=$t['judul']?>">
                                        <label class="font-weight-bold text-black"
                                            for="<?=$t['judul_seo']?>"><?=$t['judul']?></label>
                                        <br>
                                        <?php endforeach ?>
                                    </div>
                                    <?php endforeach ?>
                                </div>
                            </div> <input type="button" name="next" class="next action-button ms-input" value="Next" />
                            <input type="button" name="previous" class="previous ms-input action-button-previous"
                                value="Previous" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <label class="fieldlabels " >Nama *</label>
                                <input id="nama" name="nama" type="text" class="required ms-input form-control ">
                                <label class="fieldlabels " >No.Telp / WA *</label>
                                <input id="no_telp" name="no_telp" type="text" class="required ms-input form-control ">
                                <label class="fieldlabels " >Email *</label>
                                <input id="email" name="email" type="email" class="required ms-input form-control ">
                                <label class="fieldlabels " >Anda Dari Kota *</label>
                                <input id="kota_asal" name="kota_asal" type="text" class="required ms-input form-control ">
                                <label class="fieldlabels " >Media Konsultasi Yang Anda Inginkan *</label>
                                <select name="media_konsultasi" class="form-control">
                                    <option value="Telepon">Telepon (Recommended)</option>
                                    <option value="Whatsapp">Whatsapp</option>
                                    <option value="Email">Email</option>
                                </select>
                                <label class="fieldlabels " >Pesan Tambahan</label>
                                <textarea name="pesan_tambahan"  rows="5" class="form-control" ></textarea>
                            </div> <input type="button" name="next" class="next action-button" value="Kirim" /> <input
                                type="button" name="previous" class="previous action-button-previous"
                                value="Previous" />
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mb-3">Syarat & Ketentuan Custom Liburan ke Jogja</h1>
            <?=$syarat['deskripsi']?>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.0/pikaday.min.js"
    integrity="sha512-AWC8WaJpos1L8xD++XDtqY3znmqhqDY/o4KZ3wo7kmt1Hx6YjP4ZqPnYDrLg1ymG6iidGzq/UKHS/MxBwVAlwQ=="
    crossorigin="anonymous"></script>
<script>
var picker = new Pikaday({
    field: document.querySelector('.datepicker'),
    format: 'dd/mm/YY',
    toString(date, format) {
        // you should do formatting based on the passed format,
        // but we will just return 'D/M/YYYY' for simplicity
        const day = date.getDate();
        const month = date.getMonth() + 1;
        const year = date.getFullYear();
        return `${day}/${month}/${year}`;
    },
    minDate: new Date(),
});
</script>