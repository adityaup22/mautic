<?php
/**
 * @package     Mautic
 * @copyright   2014 Mautic Contributors. All rights reserved.
 * @author      Mautic
 * @link        http://mautic.org
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace Mautic\FormBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class FormFieldGroupType
 */
class FormFieldGroupType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'labelAttributes',
            'text',
            [
                'label'      => 'mautic.form.field.group.labelattr',
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'class'     => 'form-control',
                    'tooltip'   => 'mautic.form.field.help.group.labelattr',
                    'maxlength' => '255'
                ],
                'required'   => false
            ]
        );

        if (isset($options['data']['optionlist'])) {
            $data = $options['data']['optionlist'];
        } elseif (isset($options['data']['list'])) {
            // BC support
            $data = ['list' => $options['data']['list']];
        } else {
            $data = [];
        }

        $builder->add(
            'optionlist',
            'sortablelist',
            [
                'label'       => 'mautic.core.form.list',
                'label_attr'  => ['class' => 'control-label'],
                'data'        => $data,
                'with_labels' => true,
            ]
        );

    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return "formfield_group";
    }
}
