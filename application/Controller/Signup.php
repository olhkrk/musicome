<?php
/**
 * Class Signup
 *
 * @author Kriukova Olha <olhkrk@gmail.com>
 * @copyright 2021 KO
 */

use Musicome\Core\AbstractController;

/**
 * Class Signup
 */
class Signup extends AbstractController
{
    /**
     * Index action
     */
    public function actionIndex()
    {
        $this->view->generate('signup/index_view.php', 'signup_template_view.php');
    }

    /**
     * Signin action
     */
    public function actionSignin()
    {
        $this->view->generate('signup/signin_view.php', 'signup_template_view.php');
    }

    /**
     * Reset action
     */
    public function actionReset()
    {
        $this->view->generate('signup/reset_view.php', 'signup_template_view.php');
    }

    /**
     * Reset finish action
     */
    public function actionResetfinish()
    {
        $this->view->generate('signup/reset_finish_view.php', 'signup_template_view.php');
    }

    /**
     * Change password action
     */
    public function actionChangepassword()
    {
        $this->view->generate('signup/change_password_view.php', 'signup_template_view.php');
    }

    /**
     * Quiz action
     */
    public function actionQuiz()
    {
        $this->view->generate('signup/quiz_view.php', 'signup_template_view.php');
    }
}