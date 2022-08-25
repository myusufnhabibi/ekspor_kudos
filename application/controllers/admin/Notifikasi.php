<?php
defined('BASEPATH') or exit('No direct script access allowed');

class notifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('Pemesanan_model');
    }

    function getDevice()
    {
        $API_TOKEN = $this->fungsi->device()->password;
        $DEVICE_ID = $this->fungsi->device()->username;

        try {
            $reqParams = [
                'token' => $API_TOKEN,
                'url' => 'https://api.kirimwa.id/v1/devices',
                'method' => 'POST',
                'payload' => json_encode([
                    'device_id' => $DEVICE_ID // ganti sesuai keinginan
                ])
            ];

            $response = apiKirimWaRequest($reqParams);
            echo $response['body'];
        } catch (Exception $e) {
            print_r($e);
        }
    }

    function qr_wa()
    {
        $API_TOKEN = $this->fungsi->device()->password;
        $DEVICE_ID = $this->fungsi->device()->username;
        try {
            $query = http_build_query(['device_id' => $DEVICE_ID]);
            $baseApiUrl = 'https://api.kirimwa.id/v1';
            $reqParams = [
                'token' => $API_TOKEN,
                'url' => sprintf('%s/qr?%s', $baseApiUrl, $query)
            ];

            $response = apiKirimWaRequest($reqParams);
            echo json_encode($response);
        } catch (Exception $e) {
            print_r($e);
        }
    }

    function send_setor()
    {
        $post = $this->input->get(null, true);
        $data = $this->tm->get('tbl_nasabah', $post['nomer'], 'nomer_rek')->row_array();

        $API_TOKEN = $this->fungsi->device()->password;
        $DEVICE_ID = $this->fungsi->device()->username;
        // $this->create_pdf();

        try {
            $baseApiUrl = 'https://api.kirimwa.id/v1/messages';
            $reqParams = [
                'token' => $API_TOKEN,
                'url' => $baseApiUrl,
                'method' => 'POST',
                'payload' => json_encode([
                    'message' => base_url() . (string)$post['nomer'] . '.pdf',
                    'phone_number' =>  $data['no_wa'],
                    'message_type' => 'document',
                    'device_id' => $DEVICE_ID,
                    'caption' => 'Nota Setor'
                ])
            ];

            $response = apiKirimWaRequest($reqParams);
            $callback = ['header' => $response['body']];
            unlink($post['nomer'] . '.pdf');
            echo json_encode($callback);
        } catch (Exception $e) {
            print_r($e);
        }
    }

    public function update_po()
    {
        $post = $this->input->get(null, true);
        $po = $this->input->get('no', true);
        $tgl = $this->input->get('tglrenca', true);
        // $cek_tgl = $this->pemesanan_model->get('no_pesan', 'tbl_pemesanan', $tgl, 'tgl_renc_kirim')->num_rows();
        // if ($cek_tgl > 0) {
        //     $hasil = false;
        //     $message = "Tanggal Tersebut sudah ada jadwal kirim";
        // } else {
        $hasil = $this->Pemesanan_model->update_po($post);
        $datad = $this->Pemesanan_model->get_gudang()->row_array();
        // var_dump($datad);
        // die();
        $message = "*PO (PURCHASE ORDER)*

*No PO : $po*
*Tanggal Rencana Kirim : $tgl*

*Untuk detail barang silahkan langsung buka lewat aplikasi pengelolaan ekspor*

*MARKETING - PT. Kudos Istana Furniture*
Jl. Lingkar R Agil Kusumadya – Mijen Km. 7, Kaliwungu, Kedungdowo, Kec. Kaliwungu, Kabupaten Kudus, Jawa Tengah 59361 
        ";
        // }


        $payload = ['cek' => $hasil, 'nomer' => $datad['no_wa'], 'pesan' => $message];
        echo json_encode($payload);
        // if ($this->db->affected_rows() > 0) {
        //     echo "1";
        // }
        // $API_TOKEN = $this->fungsi->device()->password;
        // try {
        //     $reqParams = [
        //         'token' => $API_TOKEN,
        //         'method' => 'POST',
        //         'url' => 'https://api.kirimwa.id/v1/batch-messages',
        //         'payload' => $this->nasabah($post['no'], $post['tglrenca']),
        //     ];

        //     $response = apiKirimWaRequest($reqParams);
        //     echo json_encode($response);
        // } catch (Exception $e) {
        //     print_r($e);
        // }
    }

    function nasabah($po, $tgl)
    {
        $DEVICE_ID = $this->fungsi->device()->username;
        $datad = $this->tm->get('tbl_user', '2', 'level')->result_array();
        $jdwl = [];
        $message = "
            PO (PURCHASE ORDER)

*No PO : $po*
*Tanggal Rencana Kirim : $tgl*

*Untuk detail barang silahkan langsung buka lewat aplikasi pengelolaan ekspor

*MARKETING - PT. Kudos Istana Furniture *
Jl. Lingkar R Agil Kusumadya – Mijen Km. 7, Kaliwungu, Kedungdowo, Kec. Kaliwungu, Kabupaten Kudus, Jawa Tengah 59361 
        ";
        foreach ($datad as $data) {
            $s[] =  [
                'message' => trim($message),
                'phone_number' => $data['no_wa'],
                'message_type' => 'text'
            ];
            $jdwl = $s;
        }
        $hasil = ['messages' => $jdwl, 'device_id' => $DEVICE_ID];
        return json_encode($hasil);
    }
}
