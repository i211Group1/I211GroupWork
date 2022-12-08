<?php
/**
 * Author: Jennifer Baldwin
 * Date: 11/10/2022
 * File: game_error.class.php
 * Description: define the GameError class. This display method displays an error message.
 */

class UserError extends IndexView{
    public function display($message){

        //display page header
        parent::displayHeader("Error");
        ?>
        <div id="main-header">Error</div>
        <hr>
        <table style="width: 100%; border: none">
            <tr>
                <td style="vertical-align: middle; text-align: center; width:100px">
                    <img src='<?= BASE_URL ?>/www/img/error.jpg' style="width: 80px; border: none"/>
                </td>
                <td style="text-align: left; vertical-align: top;">
                    <h3> Sorry, but an error has occurred.</h3>
                    <div style="color: red">
                        <?= urldecode($message) ?>
                    </div>
                    <br>
                </td>
            </tr>
        </table>
        <br><br><br><br><hr>
        <a href="<?= BASE_URL ?>/game/index">Back to game list</a>
        <?php
        //display page footer
        parent::displayFooter();
    }
}