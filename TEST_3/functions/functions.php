<?php

/* 
 * Copyright 2019 GUSTAVO.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

if (!function_exists('secure')) :

    /**
     *
     * @param string $content
     * @return string
     */
    function secure(string $content): string {
        return htmlspecialchars(trim($content));
    }

endif;

// function idproduit(array $tableau=[],string $id){
//     return array_push($tableau,$id);
// }

if(!function_exists('hashpassword')){
    function hashpassword(string $password):string {
        return hash('sha256',$password);
    }
}
if (!function_exists('debug')) :

    /**
     *
     * @param array $var
     */
    function debug($var): void {
        echo ('<pre>');
        var_dump($var);
        echo ('</pre>');
    }

endif;


// if (!function_exists('get_user_language')) :

//     /**
//      *
//      * @return string
//      */
//     function get_user_language(): string {
//         if (isset($_GET['lang']) AND ! empty($_GET['lang'])) {
//             $lang = secure(strtolower($_GET['lang']));
//             $langAvailable = ['fr', 'en'];

//             // $langReturn = (in_array($lang, $langAvailable)) ? $lang : DEFAULT_LANGUAGE;
//         } else {
//             // $langReturn = (isset($_SESSION['lang']) AND ! empty($_SESSION['lang'])) ? $_SESSION['lang'] : DEFAULT_LANGUAGE;
//         }
//         return $langReturn;
//     }

// endif;
function dateAddDay(string $date, string $njour):string {
    global $db;
    $req=$db->prepare("SELECT ADDDATE( ? , ?)");
    $req->execute([strscr($date),strscr($njour)]);
    return $req->fetchColumn();
}
function dateDifdateEnDay(string $datefin, string $datedebut):string {
    global $db;
    $req=$db->prepare("SELECT DATEDIFF(?,?)");
    $req->execute([strscr($datefin),strscr($datedebut)]);
    return $req->fetchColumn();
}
if(!function_exists('image_default')){
    function image_default() {
        return DIR.'assets/images/users/default/avatardefault.png';
    }
}

if(!function_exists('hashpassword')){
    function hashpassword(string $password):string {
        return hash('sha256',$password);
    }
}
if (!function_exists('get_page_language')) :

    /**
     *
     * @param string $lang
     * @param array $page
     * @return object
     */
    function get_page_language(string $lang, array $page) {
        $dataPage = [];
        foreach ($page as $p) :
            $jsonString = file_get_contents("./langs/{$lang}/{$p}.json");
            $json = json_decode($jsonString);
            ($dataPage[$p] = $json);
        endforeach;
        return (object) $dataPage;
    }

endif;

if (!function_exists('_e')) :
    function _e(string $content): string {
        $content = ucwords(str_replace('_', ' ', $content));
        $content = ucwords(str_replace('-', ' ', $content));
        $content = ucwords(str_replace('\\', ' ', $content));
        return $content;
    }
endif;

if (!function_exists('gravatar')) :
    function gravatar(string $email, string $name): string {
//        return "http://gravatar.com/avatar/" . md5(strtolower(trim($email))) . '?s=50&d=http://www.archibtp.fr/sites/default/files/user_avatar_unknown.png';
        return "http://gravatar.com/avatar/" . md5(strtolower(trim($email))) . '?s=50&d=' . LINK . generate_ui_avatar($name);
    }

endif;

if (!function_exists('is_ajax')) :
    function is_ajax(): bool {
        return !empty($_SERVER['HTTP_X_REQUEST_WITH']) AND strtolower($_SERVER['HTTP_X_REQUEST_WITH']) == 'XmlHttpRequest';
    }

endif;

if (!function_exists('error_page_redirect')) :
    function error_page_redirect(): void {
         //require_once ('./controllers/404.controller.php');
        require_once ('./views/error.view.php');
    }

endif;

if (!function_exists('redirect')) :
    function redirect(string $page): string {
        return (LINK . $page);
    }

endif;

if (!function_exists('get_image_file')) :
    function get_image_file(string $file, string $imageName): string {
        return (LINK . 'assets/img/' . $file . '/' . $imageName);
    }

endif;

if (!function_exists('get_image_directory')) :
    function get_image_directory(string $file, string $imageName): string {
        return ('assets/img/' . $file . '/' . $imageName);
    }

endif;

if (!function_exists('redirect_header')) :
    function redirect_header(string $page): void {
        if (headers_sent()) :
            echo "<script type='text/javascript'>document.location.href = '" . $page . "';</script>\n";
        else :
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: ' . LINK . $page);
        endif;
        die();
    }

   

endif;

if (!function_exists('redirect_with_id')):
    function redirect_with_id(string $page, string $id): string {
        return (LINK . $page . '/' . $id);
    }
    function redirect_with_id1(string $page, string $id1,string $id2): string {
        return (LINK . $page . '/' . $id1.'/'.$id2);
    }

endif;
if (!function_exists('connected')){
    function connected(){
        if(isset($_SESSION['gmsa']) AND !empty($_SESSION['gmsa'])){

        }else{
            header('location:'.LINK.'login');
        }
    }
}

if (!function_exists('flash')) :
    function flash(string $header, array $texts, string $class): string {
        foreach ($texts as $t) :
            return ('<div class="alert alert-' . $class . ' alert-dismissible show border-' . $class . '" role="alert">
                            <strong>' . $header . ': </strong> ' . $t . '.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>');
        endforeach;
    }

endif;

if (!function_exists('confirm')) :
    function confirm(string $text, string $idAttribute, string $labelAttribute): string {
        return ('<div data-backdrop="static" data-keyboard="true" class="modal" id="' . $idAttribute . '" tabindex="-1" role="dialog" aria-labelledby="' . $labelAttribute . '" aria-hidden="true">
                    <div class="modal-dialog" data-focus="false" data-keyboard="static" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title lead" id="' . $labelAttribute . '"> Confirmation</h5>
                                <button style="margin-top: -25px;" type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="text-dark"><span class="fa fa-question-circle fa-1x"></span> ' . $text . '</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Non</button>
                                <button type="button" class="btn btn-success btn-sm">Oui</button>
                            </div>
                        </div>
                    </div>
                </div>');
    }

endif;

if (!function_exists('timeago')) :
    function timeago(string $timeFormat): string {
        return ('<span title="' . $timeFormat . '" class="timeago">' . $timeFormat . '</span>');
    }

endif;

if (!function_exists('french_timestamp')) :
    function french_timestamp(string $timestamp): string {
        return strftime('%d, %B %G', strtotime($timestamp));
    }

endif;

if (!function_exists('check_image_existance')) :
    function check_image_existance(array $image): bool {
        if (isset($_FILES) AND ! empty($_FILES)) :
            extract($_FILES);

            $avatarStudentsName = $image['name'];
            $avatarStudentsExe = pathinfo($avatarStudentsName, PATHINFO_EXTENSION);
            $avatarStudentsSize = $image['size'];
            $avatarStudentsError = $image['error'];

            $allow = ['jpg', 'jpeg', 'gif', 'bmp', 'png', 'ico'];

            if (empty($avatarStudentsName)) :
                array_push($errors, 'Veillez sélectionner une photo de profil');
                return false;
            elseif (!in_array(strtolower($avatarStudentsExe), $allow)) :
                array_push($errors, 'Ce fichier n\'est pas une image');
                return false;
            elseif ($avatarStudentsSize > 5000000) :
                array_push($errors, 'Cette image est trop lourde');
                return false;
            elseif ($avatarStudentsError != 0) :
                array_push($errors, 'Erreur de sélection d\'image');
                return false;
            endif;
        endif;
    }

endif;

if (!function_exists('create_token')) :
    function create_token(string $token): string {
        return password_hash($token, PASSWORD_BCRYPT);
    }

endif;

if (!function_exists('resize_image')) :
    function resize_image(string $file, int $width, int $height, int $quality = 100): bool {
        # We find the right file
        $pathinfo = pathinfo(trim($file, '/'));
        $output = $pathinfo['dirname'] . '/' . $pathinfo['filename'] . '_' . $width . 'x' . $height . '.' . $pathinfo['extension'];
        # Setting defaults and meta
        $info = getimagesize($file);
        list($width_old, $height_old) = $info;
        # Create image ressource
        switch ($info[2]) :
            case IMAGETYPE_GIF: $image = imagecreatefromgif($file);
                break;
            case IMAGETYPE_JPEG: $image = imagecreatefromjpeg($file);
                break;
            case IMAGETYPE_PNG: $image = imagecreatefrompng($file);
                break;
            default: return false;
        endswitch;
        # We find the right ratio to resize the image before cropping
        $heightRatio = $height_old / $height;
        $widthRatio = $width_old / $width;
        $optimalRatio = $widthRatio;
        if ($heightRatio < $widthRatio) :
            $optimalRatio = $heightRatio;
        endif;
        $height_crop = ($height_old / $optimalRatio);
        $width_crop = ($width_old / $optimalRatio);
        # The two image ressources needed (image resized with the good aspect ratio, and the one with the exact good dimensions)
        $image_crop = imagecreatetruecolor($width_crop, $height_crop);
        $image_resized = imagecreatetruecolor($width, $height);
        # This is the resizing/resampling/transparency-preserving magic
        if (($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG)) :
            $transparency = imagecolortransparent($image);
            if ($transparency >= 0) :
                $trnprt_color = [];
                /** @var type $trnprt_indx */
                $transparent_color = imagecolorsforindex($image, $trnprt_indx);
                $transparency = imagecolorallocate($image_crop, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
                imagefill($image_crop, 0, 0, $transparency);
                imagecolortransparent($image_crop, $transparency);
                imagefill($image_resized, 0, 0, $transparency);
                imagecolortransparent($image_resized, $transparency);
            elseif ($info[2] == IMAGETYPE_PNG) :
                imagealphablending($image_crop, false);
                imagealphablending($image_resized, false);
                $color = imagecolorallocatealpha($image_crop, 0, 0, 0, 127);
                imagefill($image_crop, 0, 0, $color);
                imagesavealpha($image_crop, true);
                imagefill($image_resized, 0, 0, $color);
                imagesavealpha($image_resized, true);
            endif;
        endif;
        if (($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG)) :
            $transparency = imagecolortransparent($image);
            if ($transparency >= 0) :
                $trnprt_indx = imagecolorat($image, 0, 0); // ADDED
                $trnprt_color = imagecolorsforindex($image, $trnprt_indx);
                $transparency = imagecolorallocate($image_crop, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']); // UPDATED
                imagefill($image_crop, 0, 0, $transparency);
                imagecolortransparent($image_crop, $transparency);
                imagefill($image_resized, 0, 0, $transparency);
                imagecolortransparent($image_resized, $transparency);
            elseif ($info[2] == IMAGETYPE_PNG) :
                imagealphablending($image_crop, false);
                imagealphablending($image_resized, false);
                $color = imagecolorallocatealpha($image_crop, 0, 0, 0, 127);
                imagefill($image_crop, 0, 0, $color);
                imagesavealpha($image_crop, true);
                imagefill($image_resized, 0, 0, $color);
                imagesavealpha($image_resized, true);
            endif;
        endif;
        imagecopyresampled($image_crop, $image, 0, 0, 0, 0, $width_crop, $height_crop, $width_old, $height_old);
        imagecopyresampled($image_resized, $image_crop, 0, 0, ($width_crop - $width) / 2, ($height_crop - $height) / 2, $width, $height, $width, $height);
        # Writing image according to type to the output destination and image quality
        switch ($info[2]) :
            case IMAGETYPE_GIF: imagegif($image_resized, $output, 80);
                break;
            case IMAGETYPE_JPEG: imagejpeg($image_resized, $output, 80);
                break;
            case IMAGETYPE_PNG: imagepng($image_resized, $output, 9);
                break;
            default: return false;
        endswitch;
        return true;
    }

endif;

if (!function_exists('set_language_link')) :
    function set_language_link(string $lang, string $page): string {
        return LINK . $lang . '/' . $page;
    }

endif;

if (function_exists('create_avatar_image')) :
    function create_avatar_image(string $string, string $name): string {

        $imageFilePath = "assets/img/avatar/" . $name . ".png";

        //base avatar image that we use to center our text string on top of it.
        $avatar = imagecreatetruecolor(60, 60);
        imagesavealpha($avatar, true);
        $trans_colour = imagecolorallocatealpha($avatar, 0, 0, 0, 127);
        imagefill($avatar, 0, 0, $trans_colour);

        $bg_color = imagecolorallocatealpha($avatar, random_int(0, 255), rand(0, 255), random_int(0, 255), 127);

        imagefill($avatar, 0, 0, $bg_color);

        $avatar_text_color = imagecolorallocate($avatar, 255, 255, 250);
        // Load the gd font and write
        $font = imageloadfont('gd-files/gd-font.gdf');

        imagestring($avatar, $font, 15, 15, $string, $avatar_text_color);

        imagepng($avatar, $imageFilePath);

        imagedestroy($avatar);
        imagedashedline($avatar, 0, 0, 0, 0, $bg_color);

        return $imageFilePath;
    }

endif;

if (!function_exists('mc_encrypt')) :
    function mc_encrypt(string $encrypt, string $key): string {
        $encrypt = serialize($encrypt);
        $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC), MCRYPT_DEV_URANDOM);
        $key = pack('H*', $key);
        $mac = hash_hmac('sha256', $encrypt, substr(bin2hex($key), -32));
        $passcrypt = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $encrypt . $mac, MCRYPT_MODE_CBC, $iv);
        $encoded = base64_encode($passcrypt) . '|' . base64_encode($iv);
        return $encoded;
    }

endif;

if (!function_exists('mc_decrypt')) :
    function mc_decrypt(string $decrypt, string $key): string {
        $decrypt = explode('|', $decrypt . '|');
        $decoded = base64_decode($decrypt[0]);
        $iv = base64_decode($decrypt[1]);
        if (strlen($iv) !== mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)) :
            return false;
        endif;
        $key = pack('H*', $key);
        $decrypted = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $decoded, MCRYPT_MODE_CBC, $iv));
        $mac = substr($decrypted, -64);
        $decrypted = substr($decrypted, 0, -64);
        $calcmac = hash_hmac('sha256', $decrypted, substr(bin2hex($key), -32));
        if ($calcmac !== $mac) :
            return false;
        endif;
        $decrypted = unserialize($decrypted);
        return $decrypted;
    }

endif;

if (!function_exists('pw_hash')) :
    function pw_hash(string $pass): string {
        return "!00!:)" . substr(hash('sha512', $pass), 0, -4);
    }

endif;

if (!function_exists('pw_check')) :
    function pw_check(string $password, string $pass): bool {
        return strcmp(pw_hash($password), $pass) == true;
    }

endif;

if (!function_exists('check_email')) :
    function check_email(string $email): bool {
        $email_regexp = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        return preg_match($email_regexp, $email);
    }

endif;

if (!function_exists('auto_link_urls')) :
    function auto_link_urls(string $str, bool $popup = FALSE): string {
        if (preg_match_all("#(^|\s|\()((http(s?)://)|(www\.))(\w+[^\s\)\<]+)#i", $str, $matches)) {
            $pop = ($popup == TRUE) ? " target=\"_blank\" " : "";
            for ($i = 0; $i < count($matches['0']); $i++) :
                $period = '';
                if (preg_match("|\.$|", $matches['6'][$i])) :
                    $period = '.';
                    $matches['6'][$i] = substr($matches['6'][$i], 0, -1);
                endif;
                $str = str_replace($matches['0'][$i],
                $matches['1'][$i] . '<a href="http' .
                $matches['4'][$i] . '://' .
                $matches['5'][$i] .
                $matches['6'][$i] . '"' . $pop . '>http' .
                $matches['4'][$i] . '://' .
                $matches['5'][$i] .
                $matches['6'][$i] . '</a>' .
                $period, $str);
            endfor;
        }//end if
        return $str;
    }

endif;

if (!function_exists('check_username')) :
    function check_username(string $string): bool {
        return !preg_match('/[^a-z_\-0-9]/i', strtolower($string));
    }

endif;

// if (!function_exists('permission')) :

//     /**
//      *
//      * @global \PDO $con
//      * @param string $permission
//      * @param bool $redirect
//      * @return bool
//      */
//     function permission(string $permission, bool $redirect = false): bool {
//         global $con;
//         if (!isset($_SESSION)) :
//             session_start();
//         endif;

//         // Check if user is logged in
//         if (empty($_SESSION['UID']) || empty($_SESSION['username']) || empty($_SESSION['udata'])) :
//             $_SESSION['err'] = "Accès Interdit";
//             if ($redirect) :
//                 redirect("login");
//             endif;
//         else :
//             $udata = unserialize(base64_decode(mc_decrypt($_SESSION['udata'], ENCRYPTION_KEY)));
//             if ($udata['username'] != $_SESSION['username']) :
//                 $_SESSION['err'] = "Accès Interdit";
//                 if ($redirect) :
//                     redirect("login");
//                 endif;
//             else :
//                 //Check Permission
//                 $re = $con->prepare("SELECT COUNT(*) FROM roles_permissions rp INNER JOIN permissions p ON p.PID = rp.PID WHERE rp.RID = ? AND p.perm = ? LIMIT 1");
//                 $rs = $re->execute([intval($udata['role_id']), secure($permission)]);
//                 if ($rs[0] > 0) :
//                     return true;
//                 elseif ($redirect) :
//                     $_SESSION['err'] = "Accès Interdit";
//                     redirect("login");
//                 endif;
//             endif;
//         endif;

//         return false;
//     }

// endif;

if (!function_exists('logout')) {

    /**
     *
     * @return void
     */
    function logout(): void {
        if (!empty($_SESSION['username'])) {
            session_destroy();
            session_unset();
            unset($_SESSION['username']);
            redirect_header('');
        } else {
            redirect_header('');
        }
    }

}


if (!function_exists('generate_ui_avatar')) :

    /**
     *
     * Avatars de l'Interface Utilisateur (UI-Avatars)
     * Générez des avatars avec les initiales de noms.
     * UI Avatars possède une API simple à utiliser,
     * sans limitation ni idenfiant. Aucun suivi d'utilisation
     * et aucune information n'est stokée.
     * Les images finales sont mises en cache mais rien d'autres.
     * Il suffit d'écrire nom ou prénom, ou les deux.
     * 
     * @param string $name Nom (<code>name</code>). Le nom utilisé pour générer les initiales. Vous pouvez également spécifier vous-même les initiales. Par défaut: John Doe.
     * Exemple: <code style="color: blue;">GET</code> <code>https://ui-avatars.com/api/?<code style="color: orange;">name</code>John+Doe </code>
     * @param string $background Couleur de fond (<code>background</code>). Couleur hexadécimale pour l'arrière-plan de l'image, sans le hachage (#). Par défaut: f0e9e9.
     * @param string $color Couleur de police (<code>color</code>). Couleur hexadécimale pour la police; sans le hachage (#). Par défaut: 8b5d5d.
     * @param float $size Taille de l'image (<code>size</code>). Taille de l'image de l'avatar en pixels. Entre 16 et 512. Par défaut: 64.
     * @param float $fontSize Taille de police (<code>font-size</code>). Taille de police en poucentage de <code>size</code>. Entre 0.1 et 1. Par défaut: 0.5.
     * @param int $length Caratères initiaux (<code>length</code>). Longueur des initiales générées. Par défaut: 2.
     * @param bool $rounded Image arrondie (<code>rounded</code>). Boolean spécifiant si l'image renvoyée doit être
     * @param bool $bold Boolean Gras (<code>bold</code>). spécifiant si les lettres retournées doivent utiliser une police en gras. Par défaut: false.
     * @param bool $uppercase Majuscule (<code>uppercase</code>). Décidez si l'API doit mettre le nom / les initiales en majuscule. Par défaut: true.
     * @return string Toutes les demandes retournent un flux d'images à utiliser directement dans une <code> <img/> </code> balise.
     */
    function generate_ui_avatar(string $name, string $background = 'f0e9e9', string $color = '8b5d5d', float $size = 64, float $fontSize = 0.5, int $length = 2, bool $rounded = true, bool $bold = false, bool $uppercase = true): string {
        return ("https://ui-avatars.com/api/?name={$name}&background={$background}&color={$color}&size={$size}&font-size={$fontSize}&length={$length}&rounded={$rounded}&bold={$bold}&uppercase={$uppercase}");
    }

endif;

if (!function_exists('get_client_ip')) :

    /**
     *
     * @return string Cette fonction permet recuperer l'adresse IP du client connecter sur le site web
     */
    function get_client_ip(): string {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP'])) :
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        elseif (isset($_SERVER['HTTP_X_FORWARD_FOR'])) :
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        elseif (isset($_SERVER['HTTP_X_FORWARDED'])) :
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        elseif (isset($_SERVER['HTTP_X_FORWARD_FOR'])) :
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        elseif (isset($_SERVER['HTTP_X_FORWARDED'])) :
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        elseif (isset($_SERVER['REMOTE_ADDR'])) :
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else :
            $ipaddress = 'UNKNOWN';
        endif;
        return $ipaddress;
    }

endif;

if (!function_exists('get_visitors_count')) :

    /**
     *
     * @return int
     */
    function get_visitors_count(): void {
        if (!isset($_SESSION['visitors'])) :
            $visitors = 1;
            $file = 'visitors.txt';
            if (file_exists($file)) :
                $visitors = file_get_contents($file);
                if (is_numeric($visitors)) :
                    $visitors++;
                endif;
            endif;
        endif;
        file_put_contents($file, $visitors);
        $_SESSION['visitors'] = true;
        readfile($file);
    }

endif;

if (!function_exists('get_current_page_count')) :

    /**
     *
     * @return int
     */
    function get_current_page_count(): int {
        if (!isset($_SESSION)) :
            session_start();
        endif;
        $_SESSION['pageCount'] = isset($_SESSION['pageCount']) ? $_SESSION['pageCount'] + 1 : 1;
        $_SESSION['show'][] = $_SESSION['lang'];
        return $_SESSION['show'];
    }

endif;

if (!function_exists ('pagination')):
    
    function pagination(): void {
        
    }
endif;


if (!function_exists('parmalien')):

    /**
     *
     * @return string
     */
    function paramlien (string $link): string {        
        $format1 = str_replace(' ', '-', $link);
        $format2 = str_replace('\'', '-', $format1);
        $format3 = str_replace('à', 'a', $format2);
        $format4 = str_replace('é', 'e', $format3);
        $format5 = str_replace('è', 'e', $format4);
        $format6 = str_replace('ë', 'e', $format5);
        $format7 = str_replace('ê', 'e', $format6);
        $format8 = str_replace('à', 'a', $format7);
        $format9 = str_replace('â', 'a', $format8);
        $format10 = str_replace('ä', 'a', $format9);
        $format11 = str_replace('ï', 'i', $format10);
        $format12 = str_replace('î', 'i', $format11);        
        $format13 = str_replace('ç', 'c', $format12);
        $format14 = strtolower ($format13);

        return $format14;
    }
endif;


function int2str($a)
{
$convert = explode('.',$a);
if (isset($convert[1]) && $convert[1]!=''){
return int2str($convert[0]).'Dinars'.' et '.int2str($convert[1]).'Centimes' ;
}
if ($a<0) return 'moins '.int2str(-$a);
if ($a<17){
switch ($a){
case 0: return 'zero';
case 1: return 'un';
case 2: return 'deux';
case 3: return 'trois';
case 4: return 'quatre';
case 5: return 'cinq';
case 6: return 'six';
case 7: return 'sept';
case 8: return 'huit';
case 9: return 'neuf';
case 10: return 'dix';
case 11: return 'onze';
case 12: return 'douze';
case 13: return 'treize';
case 14: return 'quatorze';
case 15: return 'quinze';
case 16: return 'seize';
}
} else if ($a<20){
return 'dix-'.int2str($a-10);
} else if ($a<100){
if ($a%10==0){
switch ($a){
case 20: return 'vingt';
case 30: return 'trente';
case 40: return 'quarante';
case 50: return 'cinquante';
case 60: return 'soixante';
case 70: return 'soixante-dix';
case 80: return 'quatre-vingt';
case 90: return 'quatre-vingt-dix';
}
} elseif (substr($a, -1)==1){
if( ((int)($a/10)*10)<70 ){
return int2str((int)($a/10)*10).'-et-un';
} elseif ($a==71) {
return 'soixante-et-onze';
} elseif ($a==81) {
return 'quatre-vingt-un';
} elseif ($a==91) {
return 'quatre-vingt-onze';
}
} elseif ($a<70){
return int2str($a-$a%10).'-'.int2str($a%10);
} elseif ($a<80){
return int2str(60).'-'.int2str($a%20);
} else{
return int2str(80).'-'.int2str($a%20);
}
} else if ($a==100){
return 'cent';
} else if ($a<200){
return int2str(100).' '.int2str($a%100);
} else if ($a<1000){
return int2str((int)($a/100)).' '.int2str(100).' '.int2str($a%100);
} else if ($a==1000){
return 'mille';
} else if ($a<2000){
return int2str(1000).' '.int2str($a%1000).' ';
} else if ($a<1000000){
return int2str((int)($a/1000)).' '.int2str(1000).' '.int2str($a%1000);
}
else if ($a==1000000){
return 'millions';
}
else if ($a<2000000){
return int2str(1000000).' '.int2str($a%1000000).' ';
}
else if ($a<1000000000){
return int2str((int)($a/1000000)).' '.int2str(1000000).' '.int2str($a%1000000);
}
}

////new fonction ///

if(!function_exists('secure')):
    function secure(string $content){
        return htmlspecialchars(trim($content));
    }
endif;
			//Cette fonction permet de verifier si la les champs ne sont pas vide

            function not_empty($fields = []){
                if(count($fields)!= 0){
                    foreach($fields as $field){
                        if(empty($_POST[$field]) || trim($_POST[$field])==""){
                            return false;
                        }
                    }
                    return true;
                }
            }
            //Cette fonction vous permettra de verifier si des nouvelles donnees sont deja utilisees par un autre utilisateur
            function is_already_use($field,$value,$table){
                global $con;
                $q = $con->prepare("SELECT id FROM $table WHERE $field = ?");
                $q->execute([$value]);
                $count = $q->rowCount();
                $q->closeCursor();
                return $count;
            }
            //Cette fonction permet de creer un message flash
            function set_flash($message, $type = 'info')
            {
                $_SESSION['notification']['message'] = $message;
                $_SESSION['notification']['type'] = $type;
            }
            //Cettte fonction permet de faire une redirection
            function redirect($page)
            {
                header('Location:'.$page);
            }

            function save_input_data(){
                foreach($_POST as $key => $value)
                {
                    if(strpos($key,'password') === false){
                        $_SESSION['input'][$key] = $value;
                    }
                }
            }

            function clear_input_data(){
                if(isset($_SESSION['input'])){
                    return $_SESSION['input'] = [''];
                }
            }

            function get_input($key){
                if(!empty($_SESSION['input'][$key])){
                    return secure($_SESSION['input'][$key]);
                }else{
                    return null;
                }
            }