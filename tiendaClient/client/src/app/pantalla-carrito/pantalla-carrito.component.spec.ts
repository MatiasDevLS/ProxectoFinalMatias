import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PantallaCarritoComponent } from './pantalla-carrito.component';

describe('PantallaCarritoComponent', () => {
  let component: PantallaCarritoComponent;
  let fixture: ComponentFixture<PantallaCarritoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [PantallaCarritoComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(PantallaCarritoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
