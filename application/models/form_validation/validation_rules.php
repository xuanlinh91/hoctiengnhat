<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Rules for User Model
 */
class Validation_rules
{
    function __construct()
    {
    }

    /**
     * [get_create_account_rules description]
     * @return [array] [settings rules for register]
     */


    public static function create_blog_rules()
    {
        $rules['create_blog_rules'] = array(
            array(
                'field' => 'TITLE',
                'label' => 'Title',
                'rules' => 'trim|required|max_length[150]'
            ),
            array(
                'field' => 'CONTENT',
                'label' => 'Content',
                'rules' => 'required'
            ),
             array(
                 'field' => 'PREVIEW',
                 'label' => 'Preview',
                 'rules' => 'trim|required|max_length[200]'
             )
        );
        return $rules['create_blog_rules'];
    }

    public static function create_grammar_rules()
    {
        $rules['create_grammar_rules'] = array(
            array(
                'field' => 'lesson',
                'label' => 'Title',
                'rules' => 'trim|required|is_natural_no_zero'
            ),
            array(
                'field' => 'content',
                'label' => 'Content',
                'rules' => 'trim|required'
            ),
             array(
                 'field' => 'preview',
                 'label' => 'Preview',
                 'rules' => 'trim|required|max_length[200]'
             )
        );
        return $rules['create_grammar_rules'];
    }

    public static function create_volca_rules()
    {
        $rules['create_volca_rules'] = array(
            array(
                'field' => 'lesson',
                'label' => 'Title',
                'rules' => 'trim|required|is_natural_no_zero'
            ),
            array(
                'field' => 'content',
                'label' => 'Content',
                'rules' => 'trim|required'
            ),
             array(
                 'field' => 'preview',
                 'label' => 'Preview',
                 'rules' => 'trim|required|max_length[200]'
             )
        );
        return $rules['create_volca_rules'];
    }

    public static function create_kanji_rules()
    {
        $rules['create_kanji_rules'] = array(
            array(
                'field' => 'CHAR',
                'label' => 'Hán tự',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'AMHV',
                'label' => 'Âm Hán Việt',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'NGHIA',
                'label' => 'Nghĩa',
                'rules' => 'trim|required'
            )
        );
        return $rules['create_kanji_rules'];
    }

    public static function edit_blog_rules()
    {
        $rules['edit_blog_rules'] = array(
            array(
                'field' => 'TITLE',
                'label' => 'Title',
                'rules' => 'trim|required|max_length[150]'
            ),
            array(
                'field' => 'CONTENT',
                'label' => 'Content',
                'rules' => 'required'
            ),
             array(
                 'field' => 'PREVIEW',
                 'label' => 'Preview',
                 'rules' => 'trim|required|max_length[200]'
             )
        );
        return $rules['edit_blog_rules'];
    }

    public static function update_gram_rules()
    {
        $rules['update_gram_rules'] = array(
            array(
                'field' => 'content',
                'label' => 'Content',
                'rules' => 'required'
            ),
            array(
                'field' => 'lesson',
                'label' => 'Lesson',
                'rules' => 'required|is_natural_no_zero'
            ),
             array(
                 'field' => 'preview',
                 'label' => 'Preview',
                 'rules' => 'trim|required|max_length[200]'
             )
        );
        return $rules['update_gram_rules'];
    }
    public static function update_volca_rules()
    {
        $rules['update_volca_rules'] = array(
            array(
                'field' => 'content',
                'label' => 'Content',
                'rules' => 'required'
            ),
            array(
                'field' => 'lesson',
                'label' => 'Lesson',
                'rules' => 'required|is_natural_no_zero'
            ),
             array(
                 'field' => 'preview',
                 'label' => 'Preview',
                 'rules' => 'trim|required|max_length[200]'
             )
        );
        return $rules['update_volca_rules'];
    }

    public static function update_kanji_rules()
    {
        $rules['update_kanji_rules'] = array(
            array(
                'field' => 'CHAR',
                'label' => 'Hán tự',
                'rules' => 'required'
            ),
            array(
                'field' => 'AMHV',
                'label' => 'Âm HV',
                'rules' => 'required'
            ),
            array(
                'field' => 'NGHIA',
                'label' => 'Nghĩa',
                'rules' => 'required'
            )
        );
        return $rules['update_kanji_rules'];
    }

    public static function register_user_rules()
    {
        $rules['register_user_rules'] = array(
            array(
                'field' => 'PASSWORD',
                'label' => 'Password',
                'rules' => 'required'
            ),
            array(
                'field' => 'FIRSTNAME',
                'label' => 'Firstname',
                'rules' => 'required'
            ),
            array(
                'field' => 'LASTNAME',
                'label' => 'Lastname',
                'rules' => 'required'
            ),
            array(
                'field' => 'EMAIL',
                'label' => 'Email',
                'rules' => 'required'
            ),
        );
        return $rules['register_user_rules'];
    }

    public static function add_user_rules()
    {
        $rules['add_user_rules'] = array(
            array(
                'field' => 'USERNAME',
                'label' => 'User name',
                'rules' => 'trim|required|max_length[50]|form_validation_alpha'
            ),
            array(
                'field' => 'PASSWORD',
                'label' => 'Password',
                'rules' => 'required'
            ),
            array(
                'field' => 'FIRSTNAME',
                'label' => 'Firstname',
                'rules' => 'required'
            ),
            array(
                'field' => 'LASTNAME',
                'label' => 'Lastname',
                'rules' => 'required'
            ),
            array(
                'field' => 'EMAIL',
                'label' => 'Email',
                'rules' => 'required'
            ),
        );
        return $rules['add_user_rules'];
    }

}
