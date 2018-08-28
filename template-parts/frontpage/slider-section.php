<?php
$elements = Epsilon_Page_Generator::get_instance( 'sierra_frontpage_sections_' . get_the_ID(), get_the_ID() );
$fields = $elements->sections[ $section_id ];

$grouping = array(
    'values'     => 'slider_grouping',
    'group_by'  => 'slides_title'
);
$fields[ 'slider' ] = $elements->get_repeater_field( $fields[ 'slider_repeater_field' ], array(), $grouping );

?>

<section class="main_slider_area">
    <div id="main_slider" class="rev_slider" data-version="5.3.1.6">
        <ul>
            <?php
                if( ! empty( $fields[ 'slider' ] ) ) {
                    foreach ( $fields[ 'slider' ] as $key => $value ) {
	                    ?>
                        <li data-index="rs-<?php printf( $value[ 'index' ] ); ?>" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                            data-hideslideonmobile="off" data-easein="default" data-easeout="default"
                            data-masterspeed="300"
                            data-rotate="0" data-saveperformance="off" data-title="Creative" data-param1="01"
                            data-param2=""
                            data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8=""
                            data-param9="" data-param10="" data-description="">
                            <!-- LAYER NR. 1 -->
                            <div class="slider_text_box">
                                <div class="tp-caption tp-resizeme first_text"
                                     data-x="['left','left','left','left','15','center']"
                                     data-hoffset="['0','80','80','0']"
                                     data-y="['top','top','top','top']"
                                     data-voffset="['400','400','400','250','180','180']"
                                     data-fontsize="['72','72','72','50','50','30']"
                                     data-lineheight="['82','82','82','62','62','42']"
                                     data-width="['none']"
                                     data-height="none"
                                     data-whitespace="nowrape"
                                     data-type="text"
                                     data-responsive_offset="on"
                                     data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                     data-textAlign="['left','left','left','left','left','center']">
                                    <?php echo wp_kses_post( wpautop( $value[ 'slides_description' ] ) ); ?>
                                </div>

                                <div class="tp-caption tp-resizeme secand_text"
                                     data-x="['left','left','left','left','15','center']"
                                     data-hoffset="['0','80','80','0']"
                                     data-y="['top','top','top','top']"
                                     data-voffset="['575','575','575','400','320','300']"
                                     data-fontsize="['24','24','24','18','16','16']"
                                     data-lineheight="['36','36','36','26','26','26']"
                                     data-width="['none','none','none','none','none']"
                                     data-height="none"
                                     data-whitespace="nowrape"
                                     data-type="text"
                                     data-responsive_offset="on"
                                     data-transform_idle="o:1;"
                                     data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                     data-textAlign="['left','left','left','left','left','center']">
                                    <?php echo wp_kses_post( $value[ 'slides_title' ] ); ?>
                                </div>

                                <div class="tp-caption tp-resizeme"
                                     data-x="['left','left','left','left','15','center']"
                                     data-hoffset="['0','80','80','0']"
                                     data-y="['top','top','top','top']"
                                     data-voffset="['670','670','670','480','370','350']"
                                     data-fontsize="['14','14','14','14']"
                                     data-lineheight="['46','46','46','46']"
                                     data-width="none"
                                     data-height="none"
                                     data-whitespace="nowrap"
                                     data-type="text"
                                     data-responsive_offset="on"
                                     data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
                                    <a class="more_btn" href="<?php echo esc_url( $value[ 'slides_btn_url' ] ); ?>"><?php echo esc_html( $value[ 'slides_btn_text' ] ); ?></a>
                                </div>
                                <div class="tp-caption tp-resizeme single_img"
                                     data-x="['right','right','right','right','right','right']"
                                     data-hoffset="['0','0','0','0']"
                                     data-y="['top','top','top','top']"
                                     data-voffset="['180','180','180','180','0']"
                                     data-fontsize="['65','65','60','40','25']"
                                     data-lineheight="['75','75','75','50','35']"
                                     data-width="['485','485','485','485','485']"
                                     data-height="none"
                                     data-whitespace="normal"
                                     data-type="text"
                                     data-responsive_offset="on"
                                     data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                     data-textAlign="['left','left','left','left','left','center']">
                                    <img src="<?php echo esc_url( $value[ 'slides_image' ] ); ?>" alt="">
                                </div>
                            </div>
                        </li>
	                    <?php
                    }
                }
                ?>
        </ul>
    </div>
</section>