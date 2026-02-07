@extends('website.layout')

@section('content')
    {{-- Courses Hero Section --}}
    <section class="page-hero">
        <div class="container">
            <h1>Our Italian Courses</h1>
            <p>Find the Perfect Course for Your Learning Journey</p>
        </div>
    </section>

    {{-- Courses Section --}}
    <section class="section">
        <div class="container">
            <div class="courses-grid">
                {{-- Beginner Level --}}
                <div class="course-card">
                    <div class="course-image">
                        <div class="course-level">Beginner</div>
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="course-content">
                        <h3>Italian for Beginners A1</h3>
                        <p>Start your Italian journey from scratch. Learn basic grammar, vocabulary, and everyday
                            expressions.</p>
                        <div class="course-details">
                            <div class="detail-item">
                                <i class="fas fa-clock"></i>
                                <span>40 hours</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-signal"></i>
                                <span>Beginner</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-users"></i>
                                <span>500+ Students</span>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary btn-block">Enroll Now</a>
                    </div>
                </div>

                <div class="course-card">
                    <div class="course-image">
                        <div class="course-level">Beginner</div>
                        <i class="fas fa-pencil-alt"></i>
                    </div>
                    <div class="course-content">
                        <h3>Italian for Beginners A2</h3>
                        <p>Continue your Italian learning with more complex grammar structures and expanded vocabulary.</p>
                        <div class="course-details">
                            <div class="detail-item">
                                <i class="fas fa-clock"></i>
                                <span>45 hours</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-signal"></i>
                                <span>Beginner</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-users"></i>
                                <span>400+ Students</span>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary btn-block">Enroll Now</a>
                    </div>
                </div>

                {{-- Intermediate Level --}}
                <div class="course-card">
                    <div class="course-image">
                        <div class="course-level intermediate">Intermediate</div>
                        <i class="fas fa-comments"></i>
                    </div>
                    <div class="course-content">
                        <h3>Conversational Italian B1</h3>
                        <p>Improve your speaking skills and gain confidence in everyday Italian conversations.</p>
                        <div class="course-details">
                            <div class="detail-item">
                                <i class="fas fa-clock"></i>
                                <span>50 hours</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-signal"></i>
                                <span>Intermediate</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-users"></i>
                                <span>350+ Students</span>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary btn-block">Enroll Now</a>
                    </div>
                </div>

                <div class="course-card">
                    <div class="course-image">
                        <div class="course-level intermediate">Intermediate</div>
                        <i class="fas fa-book-reader"></i>
                    </div>
                    <div class="course-content">
                        <h3>Intermediate Italian B2</h3>
                        <p>Master complex grammar, expand your vocabulary, and develop fluency in Italian.</p>
                        <div class="course-details">
                            <div class="detail-item">
                                <i class="fas fa-clock"></i>
                                <span>55 hours</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-signal"></i>
                                <span>Intermediate</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-users"></i>
                                <span>300+ Students</span>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary btn-block">Enroll Now</a>
                    </div>
                </div>

                {{-- Advanced Level --}}
                <div class="course-card">
                    <div class="course-image">
                        <div class="course-level advanced">Advanced</div>
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="course-content">
                        <h3>Business Italian</h3>
                        <p>Master professional Italian for business meetings, presentations, and correspondence.</p>
                        <div class="course-details">
                            <div class="detail-item">
                                <i class="fas fa-clock"></i>
                                <span>60 hours</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-signal"></i>
                                <span>Advanced</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-users"></i>
                                <span>200+ Students</span>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary btn-block">Enroll Now</a>
                    </div>
                </div>

                <div class="course-card">
                    <div class="course-image">
                        <div class="course-level advanced">Advanced</div>
                        <i class="fas fa-globe"></i>
                    </div>
                    <div class="course-content">
                        <h3>Italian Culture & Literature</h3>
                        <p>Explore Italian culture, history, and literature while perfecting your language skills.</p>
                        <div class="course-details">
                            <div class="detail-item">
                                <i class="fas fa-clock"></i>
                                <span>50 hours</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-signal"></i>
                                <span>Advanced</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-users"></i>
                                <span>150+ Students</span>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary btn-block">Enroll Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .page-hero {
            background: linear-gradient(135deg, var(--primary-color) 0%, #00b359 100%);
            color: white;
            text-align: center;
            padding: 120px 0 80px;
            margin-top: -80px;
        }

        .page-hero h1 {
            font-size: 48px;
            color: white;
            margin-bottom: 16px;
        }

        .page-hero p {
            font-size: 20px;
            opacity: 0.95;
        }

        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }

        .course-card {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }

        .course-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .course-image {
            position: relative;
            height: 200px;
            background: linear-gradient(135deg, var(--primary-color), #00b359);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .course-image i {
            font-size: 80px;
            color: rgba(255, 255, 255, 0.9);
        }

        .course-level {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: white;
            color: var(--primary-color);
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .course-level.intermediate {
            color: #ff9800;
        }

        .course-level.advanced {
            color: #f44336;
        }

        .course-content {
            padding: 30px;
        }

        .course-content h3 {
            font-size: 22px;
            margin-bottom: 12px;
            color: var(--dark-color);
        }

        .course-content p {
            color: var(--text-light);
            margin-bottom: 20px;
            line-height: 1.7;
        }

        .course-details {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 25px;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--text-light);
            font-size: 14px;
        }

        .detail-item i {
            color: var(--primary-color);
            width: 20px;
        }

        .btn-block {
            width: 100%;
            text-align: center;
        }

        @media (max-width: 768px) {
            .page-hero h1 {
                font-size: 36px;
            }

            .courses-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush
