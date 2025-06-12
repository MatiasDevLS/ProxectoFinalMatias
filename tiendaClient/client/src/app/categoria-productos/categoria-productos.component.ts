import { Component } from '@angular/core';
import { ProductosService } from '../services/ProductoService/productos.service';
import { CartaProductoComponent } from '../carta-producto/carta-producto.component';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-categoria-productos',
  imports: [CartaProductoComponent],
  templateUrl: './categoria-productos.component.html',
  styleUrl: './categoria-productos.component.scss'
})
export class CategoriaProductosComponent {
  productos: any;

  constructor(public productosService: ProductosService, private route: ActivatedRoute) { }

  // Obtiene todos los productos del mismo tipo
  ngOnInit(): void {
    let categoriaId = this.route.snapshot.paramMap.get('id');
    this.productosService.getProductosCategoria(categoriaId!).subscribe({
      next: (respond: any) => this.productos = respond
    });
  }
}
