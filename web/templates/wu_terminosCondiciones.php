<?php ob_start() ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<div class="container">
    <h1>Términos y Condiciones de Uso</h1>
    <p class="update">Última actualización: 09/02/2024</p>
    <p>Por favor, lee estos términos y condiciones de uso ("Términos", "Términos y Condiciones") cuidadosamente antes de utilizar el sitio web www.wuba.com operado por Wubba Bactan.</p>

    <h2>1. Aceptación de los Términos</h2>
    <p>Al acceder y utilizar el Servicio, aceptas cumplir y estar sujeto a estos Términos. Si no estás de acuerdo con alguno de estos términos, no podrás acceder al Servicio.</p>

    <h2>2. Uso del Contenido</h2>
    <ol>
        <li>Todo el contenido proporcionado en este sitio web es solo para fines de entretenimiento e humor. No garantizamos la exactitud, integridad o actualidad de cualquier información en el sitio.</li>

        <li>El contenido del sitio web puede incluir chistes, parodias, sátiras y otras formas de humor. No debes tomar el contenido en serio ni como consejo profesional.</li>
    </ol>
    <h2>3. Propiedad Intelectual</h2>
    <ol>
        <li>Todos los derechos de propiedad intelectual del contenido del sitio web, incluidos los textos, imágenes, videos, gráficos y logotipos, son propiedad de [Nombre de la Empresa] o de sus licenciantes.</li>

        <li>No se permite la reproducción, distribución o modificación del contenido del sitio web sin el consentimiento previo por escrito de [Nombre de la Empresa].</li>
    </ol>
    <h2>4. Uso Aceptable</h2>
    <ol>
    <li>Al utilizar el Servicio, aceptas no utilizarlo para ningún propósito ilegal o no autorizado.</li>

    <li>No debes interferir con la seguridad o el funcionamiento adecuado del Servicio.</li>
    </ol>
    <h2>5. Limitación de Responsabilidad</h2>
    <ol>
    <li>En ningún caso Wubba Bactan, ni sus directores, empleados, socios, agentes, proveedores o afiliados serán responsables por ningún daño directo, indirecto, incidental, especial, consecuente o punitivo que surja del uso del Servicio.</li>

    <li>Wubba Bactan no asume responsabilidad por cualquier contenido publicado por los usuarios en el sitio web.</li>
    </ol>
    <h2>6. Cambios en los Términos</h2>
    <ol>
    <li>Nos reservamos el derecho de modificar o reemplazar estos Términos en cualquier momento. Si realizamos cambios materiales, intentaremos proporcionar un aviso previo de al menos 30 días antes de que los nuevos términos entren en vigencia.</li>

    <li>Al continuar accediendo al Servicio después de que entren en vigencia los cambios en los Términos, aceptas estar sujeto a los términos revisados.</li>
    </ol>
</div>


<?php $contenido = ob_get_clean() ?>

<?php include "wu_layout_terminos.php" ?>