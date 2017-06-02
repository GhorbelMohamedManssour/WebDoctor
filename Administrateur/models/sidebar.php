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
                                Medecins
                            </a>
                            <ul>
                                <li>
                                    <a href='ajout_doctor.php' title='Add Doctor'>
                                        <i class='glyph-icon icon-chevron-right'></i>
                                        Ajouter un medecin 
                                    </a>
                                </li>
                                <li>
                                    <a href='search_doctor.php' title='Search Doctor'>
                                        <i class='glyph-icon icon-chevron-right'></i>
                                        liste de medecins
                                    </a>
                                </li>
                                <li>
                                    <a href='sup_doctor.php' title='Search Doctor'>
                                        <i class='glyph-icon icon-chevron-right'></i>
                                        Supprimer un medecin
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                    <div class='divider mrg5T mobile-hidden'></div>
                    
                </div>

            </div><!-- #page-sidebar -->
            ";
			?>