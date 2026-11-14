<?php

class Contrato
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function todos(): array
    {
        $sql = "SELECT id, nombre_cliente, tipo_equipo, tarifa_mensual FROM contratos_monitoreo ORDER BY id DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function buscar(string $termino): array
    {
        $like = "%{$termino}%";
        $sql = "SELECT id, nombre_cliente, tipo_equipo, tarifa_mensual FROM contratos_monitoreo
                WHERE nombre_cliente LIKE :q OR tipo_equipo LIKE :q
                ORDER BY id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':q', $like);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function buscarPorId(int $id): ?array
    {
        $sql = "SELECT * FROM contratos_monitoreo WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $contrato = $stmt->fetch();
        return $contrato ?: null;
    }

    public function crear(array $datos): void
    {
        $sql = "INSERT INTO contratos_monitoreo (nombre_cliente, tipo_equipo, tarifa_mensual)
                VALUES (:nombre_cliente, :tipo_equipo, :tarifa_mensual)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($datos);
    }

    public function actualizar(int $id, array $datos): void
    {
        $sql = "UPDATE contratos_monitoreo
                SET nombre_cliente = :nombre_cliente, tipo_equipo = :tipo_equipo, tarifa_mensual = :tarifa_mensual
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':nombre_cliente' => $datos['nombre_cliente'],
            ':tipo_equipo' => $datos['tipo_equipo'],
            ':tarifa_mensual' => $datos['tarifa_mensual'],
            ':id' => $id
        ]);
    }

    public function eliminar(int $id): void
    {
        $sql = "DELETE FROM contratos_monitoreo WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
