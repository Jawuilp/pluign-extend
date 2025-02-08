<?php
require_once(__DIR__ . '/../../vendor/autoload.php');

class ResponsivaPDF extends TCPDF {

    public function Header() {
        $this->SetFont('helvetica', 'B', 12);
        $this->Cell(0, 10, 'CARTA RESPONSIVA - EQUIPOS HERRAMIENTA', 0, 1, 'C');
        $this->Ln(5);
    }

    public function Footer() {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, 0, 'C');
    }

    public function generateResponsiva($data) {
        $this->AddPage();
        $this->SetFont('helvetica', '', 10);
        $html = $this->buildHTML($data);
        $this->writeHTML($html, true, false, true, false, '');
    }

    private function buildHTML($data) {
        return <<<HTML
        <h2>FOLIO: {$data['folio']}</h2>
        <h3>CARTA RESPONSIVA</h3>
        <h4>EQUIPOS-HERRAMIENTA</h4>

        <table border="1" cellpadding="4">
            <tr><th colspan="5">DATOS DEL COLABORADOR</th></tr>
            <tr>
                <td><strong>Nombre:</strong></td><td>{$data['nombre']}</td>
                <td><strong>Cargo:</strong></td><td>{$data['cargo']}</td>
            </tr>
            <tr>
                <td><strong>Usuario de red:</strong></td><td>{$data['usuario_red']}</td>
                <td><strong>Correo:</strong></td><td>{$data['correo']}</td>
            </tr>
            <tr>
                <td><strong>Área:</strong></td><td>{$data['area']}</td>
                <td><strong>Teléfono-Ext.:</strong></td><td>{$data['telefono_ext']}</td>
            </tr>
        </table>

        <h4>HARDWARE</h4>
        <table border="1" cellpadding="4">
            <tr>
                <th>TIPO</th><th>NOMBRE DE RED</th><th>NO. DE SERIE</th><th>MODELO</th><th>MARCA</th>
            </tr>
            <tr>
                <td>{$data['tipo_hardware']}</td>
                <td>{$data['nombre_red']}</td>
                <td>{$data['no_serie']}</td>
                <td>{$data['modelo']}</td>
                <td>{$data['marca']}</td>
            </tr>
        </table>

        <h4>SOFTWARE</h4>
        <table border="1" cellpadding="4">
            <tr>
                <th>SOFTWARE ESTÁNDAR CORPORATIVO</th>
                <th>SOFTWARE ESPECIAL SOLICITADO</th>
                <th>OTRO SOFTWARE SOLICITADO</th>
            </tr>
            <tr>
                <td>{$data['software_estandar']}</td>
                <td>{$data['software_especial']}</td>
                <td>{$data['otro_software']}</td>
            </tr>
        </table>

        <p>
            Por medio de la presente hago constar la recepción del equipo de cómputo que en el presente documento se describe, el cual es
            proporcionado por mi patrón únicamente para el cumplimiento de mis actividades dentro de la empresa, por lo que en ningún momento se
            transmite la propiedad del equipo y/o información alguna, motivo por el cual acepto y reconozco que es mi responsabilidad el buen uso y
            manejo del equipo de cómputo asignado, así como sus componentes, software e información ahí contenida o que se vaya generando,
            misma que será en todo momento propiedad de la empresa. El equipo que la empresa me proporciona será utilizado única y
            exclusivamente para asuntos relacionados con mi actividad laboral, por lo que me comprometo a no almacenar información personal,
            descargar archivos o aplicaciones no autorizadas, instalar software adquirido de manera ilegal, y para el caso de hacerlo, asumiré las
            consecuencias legales que se deriven, sacando en paz y a salvo a mi patrón, socios, directores, representantes legales, gerentes, clientes
            importantes y/o proveedores que resulten afectados. Para el caso de daño total o parcial, extravío o robo del equipo de referencia, informaré
            de manera inmediata al superior jerárquico y al encargado de sistemas de la empresa y me responsabilizo a pagar el costo de la reposición
            del mismo.
        </p>

        <p>
            Me comprometo a salvaguardar la información contenida en el equipo, a no hacer mal uso de esta, manteniendo en todo momento la
            confidencialidad, por lo que no podré almacenarla en dispositivos extraíbles, discos, plataformas digitales, compartirla y/o enviarla sin previa
            autorización, o de ninguna forma sustraerla. Acepto que no deberé alterar, de forma alguna, la configuración física y/o lógica del equipo
            detallado en el presente documento. Reconozco y acepto que, al momento en que me sea requerido, daré acceso total e inmediato al equipo
            para revisión, auditoría o, en su caso, devolveré el equipo en las mismas condiciones en que me fue entregado, con el desgaste normal de
            uso.
        </p>

        <table border="1" cellpadding="4">
            <tr>
                <th>AUTORIZÓ</th>
                <th>VO. BO. DE CONFIRMACIÓN</th>
                <th>DÍA</th>
                <th>MES</th>
                <th>AÑO</th>
            </tr>
            <tr>
                <td>{$data['autorizo']}</td>
                <td>{$data['vo_bo']}</td>
                <td>{$data['dia']}</td>
                <td>{$data['mes']}</td>
                <td>{$data['anio']}</td>
            </tr>
        </table>

        <p><strong>FECHA DE ENTREGA:</strong> {$data['fecha_entrega']}</p>

        <p><strong>RESPONSABLE ENTREGA EQUIPO - HERRAMIENTA:</strong> {$data['responsable_entrega']}</p>
        <p><strong>JURÍDICO:</strong> {$data['juridico']}</p>
        <p><strong>GERENCIA:</strong> {$data['gerencia']}</p>
        <p><strong>CONFORMIDAD DEL USUARIO DE RECIBIR EQUIPOS - HERRAMIENTAS:</strong></p>
        <p><strong>NOMBRE Y FIRMA:</strong> {$data['nombre_firma']}</p>
        HTML;
    }
}