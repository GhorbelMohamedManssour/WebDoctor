<?php
echo "
<div id='page-sidebar' class='scrollable-content'>

                <div id='sidebar-menu'>
                    <ul>
                        <li>
                            <a href='dashbord.php' title='Dashboard'>
                                <i class='glyph-icon icon-dashboard'></i>
                                Acceuil
                            </a>
                        </li>
                        <li>
                            <a href='javascript:;' title='Doctor Details'>
                                <i class='glyph-icon icon-code'></i>
                                Mes patients
                            </a>
                            <ul>
                                <li>
                                    <a href='doctor.php' title='Add Doctor'>
                                        <i class='glyph-icon icon-chevron-right'></i>
                                        Ajouter un patient 
                                    </a>
                                </li>
                                <li>
                                    <a href='search_doctor.php' title='Search Doctor'>
                                        <i class='glyph-icon icon-chevron-right'></i>
                                        liste de patients
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <li>
                            <a href='javascript:;' title='Pages'>
                                <i class='glyph-icon icon-folder-open'></i>
                                Visites
                            </a>
                            <ul>
                                <li>
                                    <a href='operation.php' title='Search Hospital'>
                                        <i class='glyph-icon icon-chevron-right'></i>
                                        Opérations
                                    </a>
                                </li>
                                <li>
                                    <a href='consultation.php' title='Search Hospital'>
                                        <i class='glyph-icon icon-chevron-right'></i>
                                        consultations
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                    <div class='divider mrg5T mobile-hidden'></div>
                    
                </div>

            </div><!-- #page-sidebar -->
            ";
			?>