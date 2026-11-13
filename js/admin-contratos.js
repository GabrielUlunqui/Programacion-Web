document.addEventListener("DOMContentLoaded", () => {
  const inputBusqueda = document.getElementById("buscar-contrato");
  const tbody = document.getElementById("tabla-contratos-body");
  const estado = document.getElementById("buscar-estado");

  if (!inputBusqueda || !tbody) {
    return;
  }

  const escapeHtml = (value) =>
    String(value ?? "")
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#39;");

  const filaVacia = (mensaje) => `
    <tr>
      <td colspan="5" class="text-center py-4">
        <p class="lead-muted mb-0">${escapeHtml(mensaje)}</p>
      </td>
    </tr>
  `;

  const renderizarContratos = (contratos, termino) => {
    if (!contratos || contratos.length === 0) {
      tbody.innerHTML = filaVacia(
        termino
          ? "No se encontraron contratos para la búsqueda."
          : "No hay contratos registrados."
      );
      return;
    }

    tbody.innerHTML = contratos
      .map(
        (c) => `
      <tr>
        <td>${escapeHtml(c.id)}</td>
        <td>${escapeHtml(c.nombre_cliente)}</td>
        <td>${escapeHtml(c.tipo_equipo)}</td>
        <td>${escapeHtml(c.tarifa_mensual)}</td>
        <td>
          <a href="editar.php?id=${encodeURIComponent(c.id)}" class="btn btn-sm btn-outline-primary me-2">
            <i class="bi bi-pencil"></i> Editar
          </a>
          <a href="eliminar.php?id=${encodeURIComponent(c.id)}" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar este contrato?');">
            <i class="bi bi-trash"></i> Eliminar
          </a>
        </td>
      </tr>`
      )
      .join("");
  };

  const buscarContratos = async (termino) => {
    try {
      if (estado) {
        estado.textContent = "Buscando...";
      }

      const response = await fetch(
        `../api/buscar_contratos.php?q=${encodeURIComponent(termino)}`
      );

      if (!response.ok) {
        throw new Error(`Error HTTP: ${response.status}`);
      }

      const res = await response.json();

      if (res.status === "success") {
        renderizarContratos(res.data, termino);
        if (estado) {
          const total = res.data ? res.data.length : 0;
          estado.textContent =
            total === 1 ? "1 contrato" : `${total} contratos`;
        }
      } else {
        throw new Error(res.message || "Error del servidor");
      }
    } catch (error) {
      console.error("Error al realizar la petición:", error);
      tbody.innerHTML = filaVacia(
        "No se pudo completar la búsqueda. Intentá nuevamente."
      );
      if (estado) {
        estado.textContent = "";
      }
    }
  };

  let temporizador;
  inputBusqueda.addEventListener("input", (event) => {
    const termino = event.target.value.trim();
    clearTimeout(temporizador);
    temporizador = setTimeout(() => buscarContratos(termino), 300);
  });
});
