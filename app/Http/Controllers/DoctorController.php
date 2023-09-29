<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
  // Doctor一覧を表示
  public function index()
  {
    $doctors = Doctor::all();
    return view('doctors.index', compact('doctors'));
  }

  // Doctorの新規作成フォームを表示
  public function create()
  {
    return view('doctors.create');
  }

  // 新しいDoctorをデータベースに保存
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'username' => 'required|string|unique:doctors,username|max:255',
      'email' => 'required|string|email|max:255|unique:doctors,email',
      // 他のバリデーションルールもここに追加してください
    ]);

    $doctor = Doctor::create($validatedData);
    return redirect()->route('doctors.index')->with('success', 'Doctor successfully created.');
  }

  // Doctorの詳細を表示
  public function show(Doctor $doctor)
  {
    return view('doctors.show', compact('doctor'));
  }

  // Doctorの編集フォームを表示
  public function edit(Doctor $doctor)
  {
    return view('doctors.edit', compact('doctor'));
  }

  // Doctor情報を更新
  public function update(Request $request, Doctor $doctor)
  {
    $validatedData = $request->validate([
      'username' => 'required|string|unique:doctors,username,' . $doctor->id . '|max:255',
      'email' => 'required|string|email|max:255|unique:doctors,email,' . $doctor->id,
      // 他のバリデーションルールもここに追加してください
    ]);

    $doctor->update($validatedData);
    return redirect()->route('doctors.index')->with('success', 'Doctor successfully updated.');
  }

  // Doctorを削除
  public function destroy(Doctor $doctor)
  {
    $doctor->delete();
    return redirect()->route('doctors.index')->with('success', 'Doctor successfully deleted.');
  }
}
