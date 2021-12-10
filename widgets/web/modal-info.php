<?php
if(isset($_GET["credits"]) || isset($_GET["privacy"])){
    echo "<div class='container myModal'>";
    ?>
    <div class= 'row pt-5 pl-5' id= 'header-modal'>
        <div class = 'col-1'></div> 
        <div class = 'col-5'><h2>Informacion de pagina</h2> 
        </div>  
        <div class = 'col-3'></div>         
        <div class = 'col-2'><a href='mapa.php' id='close-button'><i class='bx bx-arrow-back'></i></a></div> 
        <div class = 'col-1'></div> 
    </div>
    <div class='row p-5 ' id='container-content-text'>
        <h4>3.1 El USUARIO acepta cumplir con todas las reglas de las leyes aplicables relativas a la conducta en línea y los contenidos en línea aceptables y se abstendrá de la utilización de los equipos y Servicios de IONOS de manera que infrinjan derechos de las Partes y de terceros.
        <h4>3.2 El USUARIO acepta y garantiza que sus datos no contendrán ni enlazarán material dañoso, amenazante, violento, abusivo u odioso. El CLIENTE se abstendrá de cualquier publicación o transmisión de contenidos que, a juicio de IONOS, resulte violento, obsceno, abusivo, ilegal, xenófobo, difamatorio, pornográfico, peligroso a jóvenes, incluyendo representaciones de sexualidad con personas de edad menor o que parecen menores no obstante su edad verdadera.</h4><br>
        <h4>3.3 El USUARIO acepta que la dirección de correo electrónico facilitada por el CLIENTE a IONOS, como dato de contacto, sea el medio de recepción de cualquier comunicación por parte de IONOS en relación al presente contrato y a las obligaciones derivadas del mismo. De este modo, se considerará que IONOS cumple con la obligación de informar al CLIENTE al enviar mediante correo electrónico cualquier comunicación relevante.</h4><br>
        <h4>3.4 El USUARIO no usará cracks, números de serie de programas, cualquier otro contenido que vulnere derechos de la propiedad intelectual de terceros ni usará programas para manipular las páginas web de IONOS, p.ej. scripts.</h4><br>
        <h4>3.5 El USUARIO se abstendrá de la obtención, y/o utilización y/o tratamiento de datos personales de otros usuarios sin su consentimiento expreso o contraviniendo lo dispuesto en la Ley Federal de Protección de Datos Personales en Posesión de los Particulares, su Reglamento y demás disposiciones aplicables en materia de protección de datos personales.</h4><br>
        <h4>3.6 El USUARIO acepta y garantiza que sus datos y todo material que se transmite con los Servicios y equipos de IONOS estarán, en todo momento, libres de cualquier tipo de defectos de software dañosos, incluyendo, pero no limitado a, software "virus", "gusanos", "caballos de Troya", y otras anomalías de código fuente, que pueden causar interrupciones o fracasos de software o hardware, dar lugar a velocidad reducida operativa del ordenador, o comprometer cualquier sistema de seguridad. El CLIENTE acepta que no intentará acceder a los Servicios, equipos y la página web de IONOS o de otro cliente sin autorización, y que no utilizará los Servicios y equipos de IONOS para llevar a cabo o ayudar en la realización de cualquier ataque, especialmente ataques de denegación de servicio, a cualquier otra página web o servicio de internet. El CLIENTE se obliga a no utilizar el servidor de correo y/o de sus direcciones electrónicas con fines de enviar e-mails masivos no solicitados (spam), mail bombing, phishing, escrow fraud, scam 419, pharming, difusión de virus, o cualquier otro tipo de actividad realizada con ánimo saboteador, fraudulento o delictivo. IONOS advierte expresamente al CLIENTE que sus e-mails salientes serán filtrados automáticamente por IONOS para detectar, en su caso, dichas actividades, y el CLIENTE en este acto autoriza de forma expresa a IONOS para realizar dicho monitoreo y verificación, así como para tomar cualquier medida tendiente a limitar o suspender dichas actividades.</h4><br>
        <h4>3.7 El USUARIO no usará la página web para subir archivos no adecuados para las finalidades de hospedaje web o hosting, como por ejemplo, a título meramente enunciativo, la realización de respaldos de cualquier tipo, almacenamiento para subidas remotas, almacenamiento de datos para compartir archivos o comportamientos similares no relacionados directamente con los contenidos y aplicaciones de dicho espacio web.</h4><br>
    </div>
    
<?php
echo "</div>";
}
?>