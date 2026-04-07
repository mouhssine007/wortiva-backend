import { useState, useEffect } from 'react';
import client from '../api/client';

export type Paragraph = {
  id: number;
  story_id: number;
  german: string;
  english: string;
  is_dialogue: boolean;
  sort_order: number;
};

export type Keyword = {
  id: number;
  story_id: number;
  word: string;
  translation: string;
  word_type: 'NOUN' | 'VERB' | 'ADJECTIVE' | 'ADVERB';
  level: 'A1' | 'A2' | 'B1' | 'B2' | 'C1' | 'C2';
};

export type GrammarTableRow = {
  label: string;
  example: string;
  highlighted: string[];
};

export type ExplanationBlock = {
  subtitle_en?: string;
  content_en?: string;
  example_de?: string;
  example_en?: string;
};

export type Grammar = {
  id: number;
  story_id: number;
  rule_title: string;
  level: string;
  category: string;
  example_german: string;
  example_english: string;
  highlighted_words: string[];
  description: string;
  table_rows: GrammarTableRow[];
  quick_tip: string | null;
  explanation_blocks: ExplanationBlock[];
};

export type StoryDetail = {
  id: number;
  title: string;
  level: 'A1' | 'A2' | 'B1' | 'B2' | 'C1' | 'C2';
  cover_image_url: string;
  duration: string | null;
  chapter_count: number;
  word_count: number;
  is_premium: boolean;
  audio_url: string | null;
  paragraphs: Paragraph[];
  keywords: Keyword[];
  grammar: Grammar | null;
};

export const useStory = (id: number) => {
  const [story, setStory] = useState<StoryDetail | null>(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  useEffect(() => { if (!id) return; fetchStory(); }, [id]);

  const fetchStory = async () => {
    try {
      setLoading(true);
      setError(null);
      const response = await client.get(`/stories/${id}`);
      setStory(response.data);
    } catch (err: any) {
      setError(err.message ?? 'Failed to load story');
    } finally {
      setLoading(false);
    }
  };

  return { story, loading, error, refetch: fetchStory };
};